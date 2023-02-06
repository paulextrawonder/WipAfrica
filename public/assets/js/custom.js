"use strict";

var eyeOpen = document.querySelector("#eye-open");
var eyeClose = document.querySelector("#eye-close");
var password = document.querySelector("#password");
var eyeOpen2 = document.querySelector("#eye-open2");
var eyeClose2 = document.querySelector("#eye-close2");
var password2 = document.querySelector("#old_password");

//String Limiter function
let title = document.querySelectorAll("#support-title");
let support_message = document.querySelectorAll("#support-message");
let titleArr = Array.from(title);
titleArr.forEach((cur) => {
  //console.log(cur.innerHTML.trim());
  let str = cur.innerHTML;
  cur.textContent =
    str.trim().slice(0, 50) + (str.trim().length > 50 ? " ..." : "");
});

support_message.forEach((cur) => {
  //console.log(cur.innerHTML.trim());
  let str = cur.innerHTML;
  cur.textContent =
    str.trim().slice(0, 100) + (str.trim().length > 100 ? " ..." : "");
});

function togglePassword() {
  if (password.type === "password") {
    password.type = "text";
    eyeClose.style.display = "none";
    eyeOpen.style.display = "block";
  } else {
    password.type = "password";
    eyeClose.style.display = "block";
    eyeOpen.style.display = "none";
  }
}
function oldPassword() {
  if (password2.type === "password") {
    password2.type = "text";
    eyeClose2.style.display = "none";
    eyeOpen2.style.display = "block";
  } else {
    password2.type = "password";
    eyeClose2.style.display = "block";
    eyeOpen2.style.display = "none";
  }
}

//project sales selection
let select_project = document.getElementById("project__id");
let project_amount = document.getElementById("project_price");
let project_unit = document.getElementById("project_unit");
let project_total_amount = document.getElementById("project_total_price");

function amountWithComma(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function singlePrice() {
  let amount_value = select_project.value.split("|").splice(-1)[0].trim();
  let new_amount_value = amountWithComma(amount_value);
  //console.log(new_amount_value);
  project_amount.value = "NGN" + new_amount_value;
}

function totalPrice() {
  let amount_val = select_project.value.split("|").splice(-1)[0].trim();
  let total_price = Number(project_unit.value) * Number(amount_val);
  let new_total_price = amountWithComma(total_price);
  project_total_amount.value = "NGN" + new_total_price;
}
select_project.addEventListener("change", () => {
  singlePrice();
  totalPrice();
});

project_unit.addEventListener("change", () => {
  totalPrice();
});

// Form Validation SignUp
var form = document.getElementById("signup");
var fullname = document.getElementById("fullname");
var email = document.getElementById("email");
var pass = document.getElementById("password");
var pass2 = document.getElementById("old_password");
var emailError = document.getElementById("email__error");
var passError = document.getElementById("password__error");
var passError2 = document.getElementById("password__error2");
var group_email = document.getElementById("group__email");
var nameError = document.getElementById("name__error");
var nameError2 = document.getElementById("name__error2");
var dateError = document.getElementById("date__error");

//Show input error messages
function showError(input, message) {
  input.style.display = "block";
  input.innerText = message;
}
function showSucces(input) {
  input.style.display = "none";
}
function disableButton() {
  document.getElementById("submit__form").disabled = true;
}

function enableButton() {
  document.getElementById("submit__form").disabled = false;
}

//Check Name Validation
function checkRealtorName(error) {
  var relName = document.querySelector("#realtorName").value;
  var regName = /^[^-\s][^0-9][a-zA-Z\s-]+$/;
  if (!regName.test(relName)) {
    showError(error, "Invalid name given.");
    disableButton();
  } else {
    showSucces(error);
    enableButton();
  }
}
function checkLastName(error) {
  var relName = document.querySelector("#lastName").value;
  var regName = /^[^-\s][^0-9][a-zA-Z\s-]+$/;
  if (!regName.test(relName)) {
    showError(error, "Invalid name given.");
    disableButton();
  } else {
    showSucces(error);
    enableButton();
  }
}

//check email is valid
function checkEmail(input) {
  var re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSucces(emailError);
    enableButton();
  } else {
    showError(emailError, "Email is not invalid");
    disableButton();
  }
}

// Date Of Birth

function checkDateOfBirth() {
  var birthDate = document.getElementById("dob").value;
  console.log(birthDate);
  var arrYear = birthDate.split("-");
  var yearOfBirth = arrYear[0];
  console.log(yearOfBirth);
  var today = new Date();
  var age = today.getFullYear() - parseInt(yearOfBirth);
  if (birthDate == null || age < 18) {
    showError(dateError, "Invalid Date Of Birth, must be 18yrs above.");
    disableButton();
  } else {
    showSucces(dateError);
    enableButton();
  }
}

//check input Length
function checkLength(input, min, max) {
  if (input.value.length < min) {
    if (input === pass) {
      showError(
        passError,
        `${getFieldName(input)} must be at least ${min} characters`
      );
    } else {
      showError(
        passError2,
        `${getFieldName(input)} must be at least ${min} characters`
      );
    }

    disableButton();
  } else if (input.value.length > max) {
    if (input === pass) {
      showError(
        passError,
        `${getFieldName(input)} must be less than ${max} characters`
      );
    } else {
      showError(
        passError2,
        `${getFieldName(input)} must be less than ${max} characters`
      );
    }

    disableButton();
  } else {
    if (input === pass) {
      showSucces(passError);
    } else {
      showSucces(passError2);
    }

    enableButton();
  }
}

//get FieldName
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//Phone Number Validation
var input = document.querySelector("#phone");
var errorMsg = document.querySelector("#error-msg");
var validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = [
  "Invalid number",
  "Invalid country code",
  "Too short",
  "Too long",
  "Invalid number",
];

var iti = window.intlTelInput(input, {
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/js/utils.min.js",
});

var reset = function () {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener("blur", function () {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
      enableButton();
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
      disableButton();
    }
  }
});

// on keyup / change flag: reset
input.addEventListener("change", reset);
input.addEventListener("keyup", reset);

//Copy Referral Link
function copyFunction() {
  var copyText = document.querySelector("#ref");
  var displayText = document.getElementById("d-tooltip");
  console.log(copyText.value);
  navigator.clipboard.writeText(copyText.value);
  displayText.textContent = "Copied";
  setTimeout(function () {
    displayText.innerText = "";
  }, 1200);
}

//Ref Link
function refFunction() {
  var copyText = document.querySelector("#ref-link");
  var displayText = document.getElementById("ref-tooltip");
  console.log(copyText.value);
  navigator.clipboard.writeText(copyText.value);
  displayText.textContent = "Copied";
  setTimeout(function () {
    displayText.innerText = "";
  }, 1200);
}

//Cropper Js For Profile Cropping
var cropper;
var cropperModalId = "#cropperModal";
var $jsPhotoUploadInput = $(".js-photo-upload");

$jsPhotoUploadInput.on("change", function () {
  var files = this.files;
  if (files.length > 0) {
    var photo = files[0];

    var reader = new FileReader();
    reader.onload = function (event) {
      var image = $(".js-avatar-preview")[0];
      image.src = event.target.result;

      cropper = new Cropper(image, {
        viewMode: 1,
        aspectRatio: 1,
        minContainerWidth: 400,
        minContainerHeight: 400,
        minCropBoxWidth: 271,
        minCropBoxHeight: 271,
        movable: false,
        ready: function () {
          console.log("ready");
          console.log(cropper.ready);
        },
      });

      $(cropperModalId).modal();
    };
    reader.readAsDataURL(photo);
  }
});

$(".js-save-cropped-avatar").on("click", function (event) {
  event.preventDefault();

  console.log(cropper.ready);

  var $button = $(this);
  // $button.text("uploading...");
  // $button.prop("disabled", true);

  var canvas = cropper.getCroppedCanvas();
  var base64encodedImage = canvas.toDataURL();
  $("#avatar-crop").attr("src", base64encodedImage);
  $(cropperModalId).modal("hide");
  cropper.destroy();
});

var swiper = new Swiper(".project__slider", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".project__slider2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});
