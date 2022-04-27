window.onload = get_headings;

function get_headings() {
  const h = ["h2", "h3", "h4", "h5", "h6"];
  let contentOfHeaders = [];
  let allHeaders = [];
  let i = z = 1;

  for (let i = 0; i < h.length; i++) {
    allHeaders[i] = document.querySelectorAll(h[i]);
  }

  for (let j = 0; j < allHeaders.length; j++) {
      for (let y = 0; y < allHeaders[j].length; y++) {
          allHeaders[j][y].id = "heading_" + z;
          contentOfHeaders.push(allHeaders[j][y].textContent);
          z++;
      }
  }

  contentOfHeaders.forEach(function(item) {

    let list = document.createElement("li");
    let listLink = document.createElement("a");
    listLink.innerText = item;
    listLink.href = "#heading_" + i;
    list.appendChild(listLink);
        document.querySelector('.ct_list-of-content').appendChild(list);
    i++;
  })
}