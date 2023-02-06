"use strict";

let soon = document.querySelectorAll("#coming__soon");
let soonArr = Array.from(soon);

soonArr.map((el) => {
  el.addEventListener("click", () => {
    iziToast.show({
      title: "Sit Back!",
      message: "This feature is Coming Soon!",
      position: "topRight",
    });
  });
});

function palert(name, title, message) {
  if (name === "success") {
    iziToast.success({
      title: title,
      message: message,
      position: "topRight",
    });
  } else if (name === "warning") {
    iziToast.warning({
      title: title,
      message: message,
      position: "topRight",
    });
  } else if (name === "error") {
    iziToast.error({
      title: title,
      message: message,
      position: "topRight",
    });
  } else {
    iziToast.show({
      title: title,
      message: message,
      position: "topRight",
    });
  }
}

function wipConfirm(message, messageDelete, messageCancel) {
  swal({
    title: "Are you sure?",
    text: message,
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      swal(messageDelete, {
        icon: "success",
      });
    } else {
      swal(messageCancel);
    }
  });
}

$("#swal-6").click(function () {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your imaginary file is safe!");
    }
  });
});
