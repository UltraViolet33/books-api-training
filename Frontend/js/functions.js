const displayError = (message) => {
  const errorr_div = document.getElementById("error");
  errorr_div.classList.add("p-3");
  errorr_div.textContent = message;
};

const displayMsgBack = (message) => {
  if (message.success) {
    document.location.href = "index.php";
    return null;
  }

  const error_div = document.getElementById("error");
  error_div.classList.add("p-3");
  const message_para = document.getElementById("error");

  if (message.error) {
    message_para.textContent = message.error;
  }
};

const postData = (data, path) => {
  fetch(urlAPI + path, {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((response) => displayMsgBack(response));
};

const clearMessage = () => {
  const error_div = document.getElementById("error");
  error_div.classList.remove("p-3");
  error_div.textContent = "";
};

const extractParamsFromUrl = (nameParam) => {
  let params = new URLSearchParams(window.location.search);

  for (let p of params) {
    if (p[0] === nameParam) {
      if (isNaN(p[1])) {
        return false;
      }
      return p[1];
    }
  }

  return false;
};
