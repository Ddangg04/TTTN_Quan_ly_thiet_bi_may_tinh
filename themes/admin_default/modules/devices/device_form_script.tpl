<!-- BEGIN: main -->
<style>
  /* Custom validation styles */
  #device-form.was-validated .form-control:valid,
  #device-form.was-validated .form-select:valid,
  #device-form .form-control.is-valid,
  #device-form .form-select.is-valid {
    border-color: #dee2e6 !important;
    background-image: none !important;
    padding-right: 0.75rem !important;
  }

  #device-form.was-validated .form-control:valid:focus,
  #device-form.was-validated .form-select:valid:focus,
  #device-form .form-control.is-valid:focus,
  #device-form .form-select.is-valid:focus {
    border-color: #86b7fe !important;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
    background-image: none !important;
  }

  #device-form.was-validated .form-control:invalid,
  #device-form.was-validated .form-select:invalid,
  #device-form .form-control.is-invalid,
  #device-form .form-select.is-invalid,
  #device-form select.form-select.is-invalid,
  #device-form select#cat_id.is-invalid,
  #device-form select#brand_id.is-invalid,
  #device-form input#price.is-invalid {
    border: 1px solid #dc3545 !important;
    border-color: #dc3545 !important;
    background-image: none !important;
    padding-right: 0.75rem !important;
  }

  #device-form.was-validated .form-control:invalid:focus,
  #device-form.was-validated .form-select:invalid:focus,
  #device-form .form-control.is-invalid:focus,
  #device-form .form-select.is-invalid:focus,
  #device-form select.form-select.is-invalid:focus,
  #device-form select#cat_id.is-invalid:focus,
  #device-form select#brand_id.is-invalid:focus,
  #device-form input#price.is-invalid:focus {
    border-color: #dc3545 !important;
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    background-image: none !important;
  }

  #device-form .invalid-feedback {
    display: none !important;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
  }

  #device-form .invalid-feedback.d-block {
    display: block !important;
  }
</style>

<script type="text/javascript">
  $(document).ready(function () {
    function updateImagePreview(inputElement, previewElement) {
      var imgPath = $(inputElement).val();
      if (imgPath) {
        var imgSrc = imgPath.startsWith("/")
          ? imgPath
          : "{NV_BASE_SITEURL}" + imgPath;
        $(previewElement).removeClass("d-none").find("img").attr("src", imgSrc);
      } else {
        $(previewElement).addClass("d-none");
      }
    }

    function updateMainImagePreview() {
      updateImagePreview("#main-image", "#main-image-preview");
    }

    $("#main-image").on("change", updateMainImagePreview);
    updateMainImagePreview();
    $(document).on("change", "#main-image", updateMainImagePreview);

    $(document).on("change", "[id^=other_image_]", function () {
      var inputId = $(this).attr("id");
      var previewId =
        "#" + inputId.replace("other_image_", "other_image_preview_");
      updateImagePreview(this, previewId);
    });

    $(".price-input").on("input", function () {
      var val = $(this)
        .val()
        .replace(/[^0-9]/g, "");
      if (val) {
        $(this).val(val.replace(/\B(?=(\d{3})+(?!\d))/g, "."));
      }
    });

    function updateStatusColor() {
      var status = $("#status").val();
      if (status == "1") {
        $("#status").css({ color: "#28a745", "font-weight": "bold" });
      } else {
        $("#status").css({ color: "#dc3545", "font-weight": "bold" });
      }
    }
    $("#status option").css("color", "#000");
    updateStatusColor();
    $("#status").on("change", function () {
      updateStatusColor();
    });

    window.imageIndex = { IMAGE_COUNT };
    window.nv_add_other_image = function () {
      $("#no-img-msg").hide();
      var html =
        '<div class="col-md-6 col-lg-4 other-image-row">' +
        '<div class="border rounded p-2 mb-2">' +
        '<div class="input-group input-group-sm mb-2">' +
        '<input type="text" class="form-control form-control-sm" name="other_images[' +
        imageIndex +
        '][path]" id="other_image_' +
        imageIndex +
        '" placeholder="Đường dẫn..." readonly>' +
        '<button type="button" class="btn btn-secondary" data-toggle="selectfile" data-target="other_image_' +
        imageIndex +
        '" data-path="uploads/devices" data-type="image">' +
        '<i class="fa-solid fa-file-image"></i>' +
        "</button>" +
        '<button type="button" class="btn btn-danger" onclick="this.closest(\'.other-image-row\').remove();">' +
        '<i class="fa-solid fa-trash"></i>' +
        "</button>" +
        "</div>" +
        '<div class="text-center mb-2 d-none" id="other_image_preview_' +
        imageIndex +
        '">' +
        '<img src="" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">' +
        "</div>" +
        '<input type="text" class="form-control form-control-sm" name="other_images[' +
        imageIndex +
        '][note]" placeholder="Ghi chú...">' +
        "</div>" +
        "</div>";
      $("#other-images-list").append(html);
      imageIndex++;
    };

    // Form validation
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          var isValid = true;
          var firstError = null;

          var title = document.getElementById("title");
          var titleFeedback =
            title.parentElement.querySelector(".invalid-feedback");
          if (!title.value.trim()) {
            title.classList.add("is-invalid");
            if (titleFeedback) titleFeedback.classList.add("d-block");
            isValid = false;
            if (!firstError) firstError = title;
          } else {
            title.classList.remove("is-invalid");
            if (titleFeedback) titleFeedback.classList.remove("d-block");
          }

          var modelCode = document.getElementById("model_code");
          var modelFeedback =
            modelCode.parentElement.querySelector(".invalid-feedback");
          if (!modelCode.value.trim()) {
            modelCode.classList.add("is-invalid");
            if (modelFeedback) modelFeedback.classList.add("d-block");
            isValid = false;
            if (!firstError) firstError = modelCode;
          } else {
            modelCode.classList.remove("is-invalid");
            if (modelFeedback) modelFeedback.classList.remove("d-block");
          }

          var catId = document.getElementById("cat_id");
          var catFeedback =
            catId.parentElement.querySelector(".invalid-feedback");
          if (catId.value == "0" || catId.value == "") {
            catId.classList.add("is-invalid");
            if (catFeedback) catFeedback.classList.add("d-block");
            isValid = false;
            if (!firstError) firstError = catId;
          } else {
            catId.classList.remove("is-invalid");
            if (catFeedback) catFeedback.classList.remove("d-block");
          }

          var brandId = document.getElementById("brand_id");
          var brandFeedback =
            brandId.parentElement.querySelector(".invalid-feedback");
          if (brandId.value == "0" || brandId.value == "") {
            brandId.classList.add("is-invalid");
            if (brandFeedback) brandFeedback.classList.add("d-block");
            isValid = false;
            if (!firstError) firstError = brandId;
          } else {
            brandId.classList.remove("is-invalid");
            if (brandFeedback) brandFeedback.classList.remove("d-block");
          }

          var mainImage = document.getElementById("main-image");
          var mainImageError = document.getElementById("main-image-error");
          if (!mainImage.value.trim()) {
            mainImage.classList.add("is-invalid");
            if (mainImageError) {
              mainImageError.style.display = "block";
              mainImageError.classList.add("d-block");
            }
            isValid = false;
            if (!firstError) firstError = mainImage;
          } else {
            mainImage.classList.remove("is-invalid");
            if (mainImageError) {
              mainImageError.style.display = "none";
              mainImageError.classList.remove("d-block");
            }
          }

          var price = document.getElementById("price");
          var priceFeedback = price.nextElementSibling;
          if (
            priceFeedback &&
            !priceFeedback.classList.contains("invalid-feedback")
          ) {
            priceFeedback =
              price.parentElement.querySelector(".invalid-feedback");
          }
          var priceValue = parseFloat(price.value.replace(/[^0-9]/g, ""));
          if (!price.value.trim() || isNaN(priceValue) || priceValue <= 0) {
            price.classList.add("is-invalid");
            if (priceFeedback) priceFeedback.classList.add("d-block");
            isValid = false;
            if (!firstError) firstError = price;
          } else {
            price.classList.remove("is-invalid");
            if (priceFeedback) priceFeedback.classList.remove("d-block");
          }

          var quantity = document.getElementById("quantity");
          var qtyFeedback =
            quantity.parentElement.querySelector(".invalid-feedback");
          var qtyValue = parseInt(quantity.value);
          if (isNaN(qtyValue) || qtyValue < 0) {
            quantity.classList.add("is-invalid");
            if (qtyFeedback) qtyFeedback.classList.add("d-block");
            isValid = false;
            if (!firstError) firstError = quantity;
          } else {
            quantity.classList.remove("is-invalid");
            if (qtyFeedback) qtyFeedback.classList.remove("d-block");
          }

          if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
            if (firstError) {
              firstError.focus();
              firstError.scrollIntoView({
                behavior: "smooth",
                block: "center",
              });
            }
          }

          form.classList.add("was-validated");
        },
        false,
      );
    });

    $("#title, #model_code").on("input", function () {
      if ($(this).val().trim()) {
        $(this).removeClass("is-invalid");
        $(this)
          .closest(".position-relative")
          .find(".invalid-feedback")
          .removeClass("d-block");
      }
    });

    $("#cat_id, #brand_id").on("change", function () {
      if ($(this).val() != "0" && $(this).val() != "") {
        $(this).removeClass("is-invalid");
        $(this).parent().find(".invalid-feedback").removeClass("d-block");
      }
    });

    $("#main-image").on("change", function () {
      if ($(this).val().trim()) {
        $(this).removeClass("is-invalid");
        $("#main-image-error").hide().removeClass("d-block");
      }
    });

    $("#price").on("input", function () {
      var priceValue = parseFloat(
        $(this)
          .val()
          .replace(/[^0-9]/g, ""),
      );
      if ($(this).val().trim() && !isNaN(priceValue) && priceValue > 0) {
        $(this).removeClass("is-invalid");
        var feedback = $(this).next(".invalid-feedback");
        if (feedback.length === 0) {
          feedback = $(this).parent().find(".invalid-feedback");
        }
        feedback.removeClass("d-block");
      }
    });

    $("#quantity").on("input", function () {
      var qtyValue = parseInt($(this).val());
      if (!isNaN(qtyValue) && qtyValue >= 0) {
        $(this).removeClass("is-invalid");
        $(this).parent().find(".invalid-feedback").removeClass("d-block");
      }
    });
  });
</script>
<!-- END: main -->
