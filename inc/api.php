<?php

require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

add_action("rest_api_init", function () {
  register_rest_route("tablica", "/formlisting", [
    "methods" => "POST",
    "callback" => function ($request) {

      $author = sanitize_text_field($request["author"]);

      if ($request["title"] && mb_strlen($request["title"]) <= 255) {
        $title = sanitize_text_field($request["title"]);
      } else {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Tytuł jest niepoprawny"
        ), 400);
      };

      if ($request["description"] && mb_strlen($request["description"]) <= 5000) {
        $description = sanitize_text_field($request["description"]);
      } else {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Opis jest niepoprawny"
        ), 400);
      };

      if ($request["price"] && (float)$request["price"] > 0 && (float)$request["price"] <= 1000000 && mb_strlen($request["price"]) <= 50) {
        $price = sanitize_text_field(round((float)$request["price"], 2));
      } else {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Cena jest niepoprawna"
        ), 400);
      };
      if ($request["category"] && mb_strlen($request["category"]) <= 50) {
        $category = sanitize_text_field($request["category"]);
      } else {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Typ jest niepoprawny"
        ), 400);
      };

      if ($request["size"] && mb_strlen($request["size"]) <= 10) {
        $size = sanitize_text_field($request["size"]);
      } else {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Rozmiar jest niepoprawny"
        ), 400);
      };

      if (empty($_FILES["thumbnail"])) {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Brak głównego zdjęcia"
        ), 400);
      }


      $newPost = wp_insert_post([
        "post_title" => $title,
        "post_status" => "draft",
        "post_type" => "offers",
        "post_author"=>$author
      ]);

      if (!$newPost) {
        return new WP_REST_RESPONSE(array(
          "response" => "error",
          "reason" => "Błąd serwera. Spróbuj ponownie później"
        ), 500);
      };

      update_field('price', $price, $newPost);
      update_field('desc', $description, $newPost);
      update_field('size', $size, $newPost);
      update_field('category', $category, $newPost);

      $thumbnail = media_handle_upload("thumbnail", $newPost);
      update_field('thumbnail', $thumbnail, $newPost);

      if (!empty($_FILES["photo1"])) {
        $photo1 = media_handle_upload("photo1", $newPost);
        update_field('photo1', $photo1, $newPost);
      }

      if (!empty($_FILES["photo2"])) {
        $photo2 = media_handle_upload("photo2", $newPost);
        update_field('photo2', $photo2, $newPost);
      }

      if (!empty($_FILES["photo3"])) {
        $photo3 = media_handle_upload("photo3", $newPost);
        update_field('photo3', $photo3, $newPost);
      }

      return new WP_REST_RESPONSE(array(
        "response" => "success"
      ), 200);
    }
  ]);
});
