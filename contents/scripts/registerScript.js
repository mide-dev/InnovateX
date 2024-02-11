const birthDate = document.getElementById("birth-day");
const birthMonth = document.getElementById("birth-month");

/**
 * This is to create Birth Date from day 1-31
 * its more efficient and cleaner than duplicating html options 31 times
 */
for (let i = 1; i <= 31; i++) {
  let option = document.createElement("option");
  option.value = i;
  option.text = i;
  birthDate.add(option);
}

/**
 * Does the same as the above code for month options
 */
// prettier-ignore
const monthList = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];

monthList.forEach((month, idx) => {
  let option = document.createElement("option");
  option.value = idx + 1;
  option.text = month;
  birthMonth.add(option);
});
