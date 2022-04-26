window.onload = word;

function word() {
  const h = ["h2", "h3", "h4", "h5", "h6"];
  let headings = [];
  for (let i = 0; i < h.length; i++) {
    if (document.getElementsByTagName(h[i])) {
      headings[i] = document.querySelector(h[i]);
      if (headings[i]) {
        console.log(headings[i].textContent);
      }
    } else {
      alert(h[i] + "doesn't exist");
    }
  }
}