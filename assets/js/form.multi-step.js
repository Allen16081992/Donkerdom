"use strict"; 
let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

document.addEventListener('DOMContentLoaded', (event) => {
  // Get a reference to your button element
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  // Add an event listener to the button
  nextBtn.addEventListener('click', function() {
      nextPrev(1);
  });
  prevBtn.addEventListener('click', function() {
      nextPrev(-1);
  });
});

function showTab(n) {
  // Display the specified tab
  let x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // Differentiate between visibility for the Previous/Next buttons
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }

  if (n == (x.length - 1)) {
    // If 'n' is the last tab, change the innerHTML and set name attribute.
    document.getElementById("nextBtn").innerHTML = "Aanmelden";
    document.getElementById("nextBtn").setAttribute("name", "signup");
  } else {
    document.getElementById("nextBtn").innerHTML = "Verder";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // Display the specified tab
  let x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if the end of the form is reached:
  if (currentTab >= x.length) {

    // Validate the checkbox
    const termsCheckbox = document.getElementById("terms");
    const termsLabel = document.querySelector("label[for='terms']");
    if (!termsCheckbox.checked) {
      termsCheckbox.classList.add("invalid");
      termsLabel.classList.add("invalid");
      currentTab--; // Decrement the tab index to stay on the last tab
      showTab(currentTab); // Show the last tab again
      return false;
    }

    //...the form gets submitted:
    document.getElementById("registerform").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
  nextBtn.disabled = !termsCheckbox.checked;
}


function validateForm() {
  // This function deals with validation of the form fields
  let x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  let i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}