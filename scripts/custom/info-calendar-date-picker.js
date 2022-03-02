const monthInputInfo = document.getElementById("info-month-picker");
const dayInputInfo = document.getElementById("info-day-picker");
const yearInputInfo = document.getElementById("info-year-picker");

let selectedDayInfo = dayInputInfo.value;
function changeInputInfo() {
  const month = monthInputInfo.value;
  const year = yearInputInfo.value;
  if (checkLeap(year)) {
    infoMonths[1].maxDays = 29;
  } else {
    infoMonths[1].maxDays = 28; //set February max days depending if leap year or not
  }

  let dayHtml = "";
  for (i = 0; i != infoMonths[month - 1].maxDays; i++) {
    dayHtml += `<option value="${i + 1}">${i + 1}</option>`;
  }
  dayInputInfo.innerHTML = dayHtml;
  dayInputInfo.value = selectedDayInfo;
  selectedDayInfo = 1;
}

function checkLeap(year) {
  let isLeap = false;
  if (year % 4 === 0) {
    if (year % 100 === 0) {
      if (year % 400 === 0) {
        //   leap year is divisible by 400 years
        isLeap = true;
      } else isLeap = false;
    } else isLeap = true;
  } else isLeap = false;
  return isLeap;
}

let infoMonths = [
  {
    name: "January",
    maxDays: 31,
  },
  {
    name: "February",
    maxDays: 28,
  },
  {
    name: "March",
    maxDays: 31,
  },
  {
    name: "April",
    maxDays: 30,
  },
  {
    name: "May",
    maxDays: 31,
  },
  {
    name: "June",
    maxDays: 30,
  },
  {
    name: "July",
    maxDays: 31,
  },
  {
    name: "August",
    maxDays: 31,
  },
  {
    name: "September",
    maxDays: 30,
  },
  {
    name: "October",
    maxDays: 31,
  },
  {
    name: "November",
    maxDays: 30,
  },
  {
    name: "December",
    maxDays: 31,
  },
];
