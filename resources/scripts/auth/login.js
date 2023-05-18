const { default: axios } = require("axios");

const form = document.querySelector('.login');
const submitButton = form.querySelector('[type="submit"]')

form.addEventListener('input', () => {
  if (form.login.value && form.password.value) {
    submitButton.disabled = false;
    return;
  }
  submitButton.disabled = true;
});

form.addEventListener('submit', (evt) => {
  evt.preventDefault();

  axios
    .post(form.action, {
      login: form.login.value,
      password: form.password.value,
    })
    .then(({ data }) => {
      if (data.role === 'admin') {
        window.location.href = '/admin';
        return;
      }
      window.location.href = '/';
    })
    .catch((error) => {
      form.querySelector('.login__error').innerHTML = error.response.data.error;
    });
});
