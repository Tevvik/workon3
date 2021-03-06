import React, { useRef, useState } from "react";
import { useDropzone } from 'react-dropzone';
import { useForm, Controller } from "react-hook-form";
import NumberFormat from 'react-number-format';

const FormListing = () => {
  let [price, setPrice] = useState(null);
  
  let [thumbnail, setThumbnail] = useState(null);
  let [thumbnailPreview, setThumbnailPreview] = useState(null);
  let thumbnailDropzone = useDropzone({ onDropAccepted: onThumbnailDrop, maxFiles: 1, multiple: false });
  
  let [photos, setPhotos] = useState([]);
  let [photoPreviews, setPhotoPreviews] = useState([]);
  let photosDropzone = useDropzone({ onDropAccepted: onPhotoDrop, onDropRejected: onPhotoDropRejected, maxFiles: 3 });
  let [tooManyPhotos, setTooManyPhotos] = useState(false);
  
  let [formStatus, setFormStatus] = useState({});
  const { register, handleSubmit, control, resetField, formState: { errors } } = useForm({ mode: "onTouched" });
  
  let author = window.reactInit.author;
  console.log(window.reactInit.categories);
  let catArr=[];
  window.reactInit.categories.forEach((cat) => {
    catArr.push(<p>{cat['main']['main_name']}</p>)
    cat['subs'].forEach((subcat)=>{
      catArr.push(<><label><input type="radio" value={subcat['sub_id']} { ...register("category", { required: true })} /> {subcat['sub_name']}</label><br /></>)
    })
})
  let sizesArr=[];
  window.reactInit.sizes.forEach(element => {
    sizesArr.push(
      <>
      <label>
        <input type="radio" value={element['id']} { ...register("size", { required: true })} /> {element['name']}
      </label>
      < br />
      </>
    )
  });
  let formEl = useRef(null);
  
  function onThumbnailDrop(file) {
    setThumbnail(file[0]);
    setThumbnailPreview(URL.createObjectURL(file[0]));
  }
  
  function removeThumbnail() {
    setThumbnail(null);
    setThumbnailPreview(null);
    resetField("thumbnail");
  }
  
  function onPhotoDrop(files) {
    setPhotos([...photos, ...files]);
    
    let tempPreviewArray = [];
    for (let file of files) {
      tempPreviewArray.push(URL.createObjectURL(file));
    }
    setPhotoPreviews([...photoPreviews, ...tempPreviewArray]);
    
    setTooManyPhotos(false);
  }
  
  function onPhotoDropRejected(files) {
    if (files[0].errors[0].code === "too-many-files") {
      setTooManyPhotos(true);
    }
  }
  
  function removePhoto(file) {
    photos.splice(file, 1);
    photoPreviews.splice(file, 1);
    setPhotos([...photos]);
    setPhotoPreviews([...photoPreviews]);
  }
  
  async function formSubmitHandler(event) {
    setFormStatus({});
    
    let formData = new FormData(formEl.current);
    formData.set("price", price);
    formData.set("thumbnail", thumbnail);
    for (let i=0; i < photos.length; i++) {
      formData.set(`photo${i+1}`, photos[i]);
    }
    
    let response = await fetch(`${page.api_url}tablica/formlisting`, {
      method: 'POST',
      body: formData
    });
    console.log(page.api_url)
    try {
      let result = await response.json();
      if (result.response === "success") {
        setFormStatus({status: "success"});
      } else {
        setFormStatus({status: "error", reason: result.reason})
      }
    } catch {
      setFormStatus({status: "error", reason: "B????d przy wysy??aniu formularza. Spr??buj ponownie p????niej"})
    }
  };
  
  return ( 
    <form onSubmit={handleSubmit(formSubmitHandler)} ref={formEl} className="form">
      <div className="author">
        <input type="hidden" value={author} { ...register("author")}/>
      </div>
      <div className="tytul">
        <label htmlFor="formlisting_title">Tytu?? og??oszenia*:</label>
        <input type="text" id="formlisting_title" { ...register("title", { required: true, maxLength: 255 }) } />
        {errors.title?.type === "required" && <p>Pole nie mo??e by?? puste</p>}
        {errors.title?.type === "maxLength" && <p>Za d??ugi tytu??. Maksymalna dozwolona liczba znak??w to 255.</p>}
      </div>

      <div className="opis">
        <label htmlFor="formlisting_description">Opis og??oszenia (do 5000 znak??w)*:</label>
        <textarea id="formlisting_description" { ...register("description", { required: true, maxLength: 5000 }) }></textarea>
        {errors.description?.type === "required" && <p>Pole nie mo??e by?? puste</p>}
        {errors.description?.type === "maxLength" && <p>Opis og??oszenia jest za d??ugi</p>}
      </div>

      <div className="cena">
        <label htmlFor="formlisting_price">Cena*:</label>
        <Controller
          render={({ field: { onChange, onBlur, name, value, ref } }) => (
            <NumberFormat
              id="formlisting_price"
              name={name}
              thousandSeparator={true}
              suffix={" z??"}
              allowEmptyFormatting={true}
              decimalScale={2}
              allowNegative={false}
              onValueChange={(values) => {
                onChange(values.value);
                setPrice(values.value);
              }}
              onBlur={onBlur}
              value={value}
              ref={ref}
              max={1000000}
            />
          )}
          name="price"
          control={control}
          rules={{required: true, max: 1000000}}
        />
        {errors.price?.type === "required" && <p>Pole nie mo??e by?? puste</p>}
        {errors.price?.type === "max" && <p>Cena nie mo??e by?? wy??sza ni?? 1,000,000 z??</p>}
      </div>
    <div className="dlakogo">
      {catArr}
        {errors.type && <p className="typ">Wybierz opcj??</p>}
      </div>

      <div className="rozmiar">
        <p>Rozmiar*:</p>
        {sizesArr}
        {errors.type && <p>Wybierz opcj??</p>}
      </div>

      <div className="zdjecieg">
        <label htmlFor="formlisting_thumbnail">Zdj??cie g????wne*:</label>
        <Controller
          name="thumbnail"
          render={({ field: { onChange } }) => (
            <div className='dropzone' {...thumbnailDropzone.getRootProps() }>
            <input id="formlisting_thumbnail" {...thumbnailDropzone.getInputProps({onChange: e => onChange(e.target.files[0])})} />
            {thumbnailDropzone.isDragActive ?
              <p>Upu???? zdj??cie tutaj...</p>
            : 
              <>
                <p>Przeci??gnij tutaj zdj??cie lub kliknij tu, aby je wybra??.</p>
                <p>Mo??esz wybra?? tylko 1 zdj??cie.</p>
              </> 
            }
            </div>
          )}
          control={control}
          defaultValue=''
          rules={{ required: true }}
        />
        {errors.thumbnail && <p>Pole nie mo??e by?? puste</p>}

        {thumbnail ? 
          <>
            <div>
              Za????czono plik:<br />
              <strong>{thumbnail.name}</strong> - {(thumbnail.size / 1024 / 1024).toFixed(2)} MB <span className="remove-file-icon" onClick={removeThumbnail}>X</span>
            </div>
            <img className="preview-picture" src={thumbnailPreview} />
          </>
        : ''}
      </div>

      <div className="zdjecied">
        <label htmlFor="formlisting_photos">Zdj??cia dodatkowe:</label>
        <div className='dropzone' {...photosDropzone.getRootProps()}>
          <input id="formlisting_photos" {...photosDropzone.getInputProps()} />
          {photosDropzone.isDragActive ?
            <p>Upu???? zdj??cia tutaj...</p>
          : 
            <>
              <p>Przeci??gnij tutaj zdj??cia lub kliknij tu, aby je wybra??.</p>
              <p>Mo??esz za????czy?? maksymalnie 3 zdj??cia.</p>
            </> 
          }
        </div>

        {tooManyPhotos ? <div>B????d: Za du??o zdj????. Mo??esz za????czy?? nie wi??cej ni?? 3 zdj??cia.</div> : ''}
        {photos.length >= 1 ? <div>Za????czono pliki:</div> : ''}
        {photos.length >= 1 ?
          photos.map((photo, index) => (
            <div key={index}>
              <strong>{photo.name}</strong> - {(photo.size / 1024 / 1024).toFixed(2)} MB <span className="remove-file-icon" onClick={() => removePhoto(index)}>X</span>
            </div>
          ))
        : ''}
        {photos.length >= 1 ?
          photoPreviews.map((photoURL, index) => (
            <div key={index}>
              <img className="preview-picture" src={photoURL} />
            </div>
          ))
        : ''}
      </div>
      <button className="buttonW" type="submit">Wy??lij</button>
      {formStatus?.status === "success" && <p>Pomy??lnie wys??ano formularz. Dzi??kujemy!</p>}
      {formStatus?.status === "error" && <p>Wyst??pi?? b????d w trakcie wysy??ania formularza:<br />{formStatus.reason}</p>}
    </form>
  )
};

export default FormListing;