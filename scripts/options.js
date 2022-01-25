if(window.innerWidth< 1000){
  document.querySelector('form.options').style.height = window.innerHeight + "px";
}
document.querySelector('.options-btn').onclick = ()=>document.querySelector("form.options").style.display = 'flex';
document.querySelector('.close-btn').onclick = ()=>document.querySelector("form.options").style.display = 'none';
document.getElementById('categories').onclick = ()=>optionsToggle(event);
document.getElementById('filters').onclick = ()=>optionsToggle(event);
document.getElementById('sort').onclick = ()=>optionsToggle(event);
const optionsToggle = (e)=>{
    document.querySelectorAll("div.expand").forEach((element)=>{element.style.display="none";element.style.opacity = 0})
    document.querySelector("div."+e.target.id+".expand").style.display = 'flex';
    document.querySelector("div."+e.target.id+".expand").style.opacity = 1;
}
document.querySelector(".categories--main input").checked = true;
document.querySelectorAll(".categories--main label").forEach((element)=>element.onclick = () => {
    document.querySelectorAll(".categories--sub div").forEach((element)=>{element.style.display="none";element.style.opacity = 0});
    document.getElementById("exp-"+event.target.htmlFor).style.display="flex";
    document.getElementById("exp-"+event.target.htmlFor).style.opacity = 1;
})
if(document.querySelector("a.clear-form")){
  document.querySelector("a.clear-form").onclick = () => {
    document.querySelectorAll('.options input[type="checkbox"]').forEach((input)=>{input.checked = false});
    document.querySelectorAll('.options input[type="text"], input[type="number"]').forEach((input)=>{input.value = null});
    document.querySelector('input[name=sort]#date_desc').checked = true;
  };
}
document.querySelector('input[name=sort]#date_desc').checked = true;