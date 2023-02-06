let todayDate = new Date();
let month = todayDate.getMonth();
let year = todayDate.getUTCFullYear() - 0;
let tdate = todayDate.getDate() + 1;
//let daysArr = [1, 2, 4];

let category = document.getElementById("category");
let idRealtor = document.getElementById("realtor-id");
let tripType = document.getElementById("trip-category");
let pickup = document.getElementById("pickup-location");
let jetty = document.getElementById("jetty");
let jettyLocation = document.getElementById("jetty-location");
let extras = document.getElementById("extras");
let extrasNumber = document.getElementById("extras-Number");

pickup.addEventListener("change", () => {
  if (pickup.value === "Lekki") {
    jetty.textContent = "Boat Yard Jetty";
    jettyLocation.textContent = "Admiralty, Lekki";
    checkTime();
  } else if (pickup.value === "Victoria-Island") {
    jetty.textContent = "Paradise Jetty";
    jettyLocation.textContent = "Walter Carrington, Victoria Island";
    checkTime();
  } else if (pickup.value === "Ikoyi") {
    jetty.textContent = "Five Cowries Terminal";
    jettyLocation.textContent = "Falomo, Ikoyi";
    checkTime();
  } else if (pickup.value === "Bariga") {
    jetty.textContent = "Bariga Waterfront Jetty";
    jettyLocation.textContent = "Ilaje Road, Bariga";
    checkTime();
  } else if (pickup.value === "Badore") {
    jetty.textContent = "Badore Ferry Terminal";
    jettyLocation.textContent = "Badore Road, Badore";
    checkTime();
  } else if (pickup.value === "Sangotedo") {
    jetty.textContent = "Badore Ferry Terminal";
    jettyLocation.textContent = "Badore Road, Badore";
    checkTime();
  }
});

function pickupReset() {
  jetty.textContent = "";
  jettyLocation.textContent = "";
  pickup.innerHTML = `<option value="" disabled selected>Select Inspection date first</option>`;
  pickup.value = "";
}

function addLocation() {
  pickup.innerHTML = `<option value="" disabled selected>Select Location</option>`;
  pickup.insertAdjacentHTML(
    "afterbegin",
    `<option value="Lekki">Lekki</option>
     <option value="Victoria-Island">Victoria-Island</option>
     <option value="Ikoyi">Ikoyi</option>
     <option value="Bariga">Bariga</option>
     <option value="Badore">Badore</option>
     <option value="Sangotedo">Sangotedo</option>`
  );
}

tripType.addEventListener("change", () => {
  if (tripType.value === "regular") {
    const picker = MCDatepicker.create({
      el: "#datepicker",
      disableWeekDays: [1, 2, 4],
      minDate: new Date(year, month, tdate),
      dateFormat: "dddd, dd-mmmm-yyyy",
      theme: {
        theme_color: "#268ADB",
      },
    });
    document.getElementById("datepicker").value = "";
    document.getElementById("time").textContent = "";
    pickupReset();
    picker.onSelect(dateInit);
  } else if (tripType.value === "vip") {
    const picker = MCDatepicker.create({
      el: "#datepicker",
      disableWeekDays: [],
      minDate: new Date(year, month, tdate),
      dateFormat: "dddd, dd-mmmm-yyyy",
      theme: {
        theme_color: "#268ADB",
      },
    });
    document.getElementById("datepicker").value = "";
    document.getElementById("time").textContent = "";
    pickupReset();
    picker.onSelect(dateInit);
  }
});

function checkTime() {
  let day = document.getElementById("datepicker").value;
  let newDay = day.split(",")[0];
  if (tripType.value === "regular") {
    console.log("true");
    if (pickup.value === "Lekki" && newDay === "Wednesday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document
        .getElementById("time")
        .insertAdjacentHTML(
          "afterbegin",
          `<option value="9:30am">9:30am</option>`
        );
    } else if (pickup.value === "Lekki" && newDay === "Friday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
            <option value="2:30am">2:30am</option>
          `
      );
    } else if (pickup.value === "Lekki" && newDay === "Friday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
            <option value="2:30am">2:30am</option>
          `
      );
    } else if (pickup.value === "Lekki" && newDay === "Saturday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="7:45am">7:45am</option>
            <option value="1:15pm">1:15pm</option>
            <option value="4:15pm">4:15pm</option>
          `
      );
    } else if (pickup.value === "Lekki" && newDay === "Sunday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="11:15am">11:15am</option>
            <option value="2:15pm">2:15pm</option>
          `
      );
    } else if (pickup.value === "Victoria-Island" && newDay === "Wednesday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (pickup.value === "Victoria-Island" && newDay === "Friday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (pickup.value === "Victoria-Island" && newDay === "Saturday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="7:30am">7:30am</option>
            <option value="11:00am">11:00am</option>
            <option value="2:30pm">2:30pm</option>
          `
      );
    } else if (pickup.value === "Victoria-Island" && newDay === "Sunday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="11:00am">11:00am</option>
            <option value="2:15pm">2:15pm</option>
          `
      );
    } else if (pickup.value === "Ikoyi" && newDay === "Wednesday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (pickup.value === "Ikoyi" && newDay === "Friday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (pickup.value === "Ikoyi" && newDay === "Saturday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="7:45am">7:45am</option>
            <option value="11:30am">11:30am</option>
            <option value="2:45pm">2:45pm</option>
          `
      );
    } else if (pickup.value === "Ikoyi" && newDay === "Sunday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="11:15am">11:15am</option>
            <option value="2:15pm">2:15pm</option>
          `
      );
    } else if (pickup.value === "Bariga" && newDay === "Wednesday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:00am">9:00am</option>
          `
      );
    } else if (pickup.value === "Bariga" && newDay === "Friday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (pickup.value === "Bariga" && newDay === "Saturday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        ` <option value="11:00am">11:00am</option>
          `
      );
    } else if (pickup.value === "Bariga" && newDay === "Sunday") {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="2:00pm">2:00pm</option>
          `
      );
    } else if (
      (pickup.value === "Badore" || pickup.value === "Sangotedo") &&
      newDay === "Wednesday"
    ) {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (
      (pickup.value === "Badore" || pickup.value === "Sangotedo") &&
      newDay === "Friday"
    ) {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="9:30am">9:30am</option>
          `
      );
    } else if (
      (pickup.value === "Badore" || pickup.value === "Sangotedo") &&
      newDay === "Saturday"
    ) {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="7:30am">7:30am</option>
        <option value="11:00am">11:00am</option>
        <option value="2:30pm">2:30pm</option>
          `
      );
    } else if (
      (pickup.value === "Badore" || pickup.value === "Sangotedo") &&
      newDay === "Sunday"
    ) {
      console.log("true");
      document.getElementById("time").textContent = "";
      document.getElementById("time").insertAdjacentHTML(
        "afterbegin",
        `<option value="1:00pm">1:00pm</option>
        <option value="4:00pm">4:00pm</option>
          `
      );
    }
  } else if (
    tripType.value === "vip" &&
    (pickup.value === "Badore" ||
      pickup.value === "Sangotedo" ||
      pickup.value === "Lekki" ||
      pickup.value === "Victoria-Island" ||
      pickup.value === "Ikoyi" ||
      pickup.value === "Bariga")
  ) {
    console.log("true");
    document.getElementById("time").textContent = "";
    document.getElementById("time").insertAdjacentHTML(
      "afterbegin",
      `<option value="9:30am">9:30am</option>
          <option value="10:30am">10:30am</option>
          <option value="11:00am">11:00am</option>
          <option value="12:30pm">12:30pm</option>
          <option value="1:30pm">1:30pm</option>
          <option value="2:30pm">2:30pm</option>
          <option value="3:00pm">3:00pm</option>
          <option value="4:00pm">4:00pm</option>
          `
    );
  }
}

idRealtor.classList.add("hide");
category.addEventListener("change", () => {
  if (category.value === "client") {
    idRealtor.classList.add("hide");
  } else if (category.value === "Realtor") {
    idRealtor.classList.remove("hide");
  }
});
extrasNumber.classList.add("hide");
extras.addEventListener("change", () => {
  if (extras.value === "no") {
    extrasNumber.classList.add("hide");
  } else if (extras.value === "yes") {
    extrasNumber.classList.remove("hide");
  }
});

const picker = MCDatepicker.create({
  el: "#datepicker",
  disableWeekDays: [1, 2, 4],
  minDate: new Date(year, month, tdate),
  dateFormat: "dddd, dd-mmmm-yyyy",
  theme: {
    theme_color: "#268ADB",
  },
});
let btnDate = document.getElementById("datepicker");
btnDate.onclick = () => {
  picker.open();
};
function dateInit() {
  document.getElementById("time").textContent = "";
  pickupReset();
  addLocation();
  console.log("ade");
}
picker.onSelect(dateInit);

let modal = document.getElementById("modal");
let trigger = document.getElementById("modal-trigger");
let btnModal = document.getElementById("modal-cancel");
trigger.addEventListener("click", () => {
  modal.classList.toggle("modal-active");
});
btnModal.addEventListener("click", () => {
  modal.classList.remove("modal-active");
});

const buttonLabel = document.getElementById("btn");
const buttonLabel2 = document.getElementById("btn-2");
const form = document.getElementById("form");
const form2 = document.getElementById("form-2");
function loading() {
  buttonLabel.classList.add("loading");
  buttonLabel.innerHTML = `SENDING... <span> &#10132;</span>`;
  buttonLabel.disabled = true;

  setTimeout(function () {
    buttonLabel.classList.remove("loading");
    buttonLabel.innerHTML = `SENT <span> &#10132;</span>`;
    buttonLabel.disabled = false;
  }, 5000);
}
form.addEventListener("submit", loading);
form2.addEventListener("submit", () => {
  buttonLabel2.classList.add("loading");
  buttonLabel2.innerHTML = `SENDING... <span> &#10132;</span>`;
  buttonLabel2.disabled = true;
  console.log("test");
  // simulate getting something from the server
  setTimeout(function () {
    buttonLabel2.classList.remove("loading");
    buttonLabel2.innerHTML = `SENT <span> &#10132;</span>`;
    buttonLabel2.disabled = false;
  }, 5000);
});
