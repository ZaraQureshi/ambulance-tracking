function map(){
  const driver=document.querySelector('.driver_map_btn');
  const hosp=document.querySelector('.hosp_map_btn');
  const driver_map=document.querySelector('.driver_map');
  const hosp_map=document.querySelector('.hosp_map');
  driver.addEventListener('click',function(){
    driver_map.classList.toggle('show_map');
    
  });
  hosp.addEventListener('click',function(){
    hosp_map.classList.toggle('show_map');
    
  })
}
let checkmark = document.getElementsByClassName('complete');

function alphanumeric(data) { 
  let letters = /^[0-9a-zA-Z]+$/;
  if (letters.test(data)) {
    return true;z
  }
  return false;
}


function validateEmail(data) {  
  let testData = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(testData.test(data)) {
    return true;
  }
  return (false)  
}  
function disableButton() {
  document.getElementById('submit').disabled = true;
}

function enableButton() {
  document.getElementById('submit').disabled = false;
}

document.getElementById('name').onblur = function() {
  let status = document.getElementById('name').value;
  if (status.length < 3) {
    document.getElementById('alert-name').innerHTML = 'Name field is empty or less than 3 characters!';
    checkmark[0].classList.remove('active');
    disableButton();
  } else if (!alphanumeric(status)) {
    document.getElementById('alert-name').innerHTML = 'Invalid characters!';
    checkmark[0].classList.remove('active');
    disableButton();
  } else {
    document.getElementById('alert-name').innerHTML = '';
    checkmark[0].classList.add('active');
    enableButton();
  }
};



document.getElementById('email').onblur = function() {
  let status = document.getElementById('email').value;
  if (status.length < 0) {
    document.getElementById('alert-email').innerHTML = 'Email field is empty';
    checkmark[2].classList.remove('active');
    disableButton();
  } else if (!validateEmail(status)) {
    document.getElementById('alert-email').innerHTML = 'Invalid email address!';
    checkmark[2].classList.remove('active');
    disableButton();
  } else {
    document.getElementById('alert-email').innerHTML = '';
    checkmark[2].classList.add('active');
    enableButton();
  }
};

document.getElementById('password').onblur = function() {
  let status = document.getElementById('password').value;
  if (status.length < 6) {
    document.getElementById('alert-password').innerHTML = 'Password field is empty or less than 6 characters';
    checkmark[3].classList.remove('active');
    disableButton();
  } else {
    document.getElementById('alert-password').innerHTML = '';
    checkmark[3].classList.add('active');
    enableButton();
  }
  
  document.getElementById('password-confirm').onblur = function() {
    let confirm = document.getElementById('password-confirm').value;
    if(status != confirm) {
      document.getElementById('alert-confirm-password').innerHTML = "Passwords don't match";
      checkmark[4].classList.remove('active');
      disableButton();
    } else {
      document.getElementById('alert-confirm-password').innerHTML = '';
      checkmark[4].classList.add('active');
      enableButton();
    }
  }
}

document.getElementById('num').onblur = function() {
  let status = document.getElementById('num').value;
  if (status < 0 || status > 10) {
    document.getElementById('alert-numbers').innerHTML = "The number is not between 0 and 10";
    checkmark[5].classList.remove('active');
    disableButton();
  } else {
    document.getElementById('alert-numbers').innerHTML = '';
    checkmark[5].classList.add('active');
    enableButton();
  }
}