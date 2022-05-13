window.onload = get_headings;

function get_headings() {
  const h = ["h2", "h3", "h4", "h5", "h6"];
  let contentOfHeaders = [];
  let allHeaders = [];
  let i = z = 1;

  for (let i = 0; i < h.length; i++) {
    allHeaders[i] = document.querySelectorAll("main " + h[i]);
  }

  for (let j = 0; j < allHeaders.length; j++) {
      for (let y = 0; y < allHeaders[j].length; y++) {
          allHeaders[j][y].id = allHeaders[j][y].textContent;
          contentOfHeaders.push(allHeaders[j][y].textContent);
          z++;
      }
  }

  contentOfHeaders.forEach(function(item) {

    let list = document.createElement("li");
    let listLink = document.createElement("a");
    listLink.innerText = item;
    listLink.href = "#" + item;
    list.appendChild(listLink);
        document.querySelector('.ct_list-of-content').appendChild(list);
    i++;
  })

  var content_btn =   document.querySelector('#ct_btn');

  content_btn.addEventListener('click', function(e) {
  [].map.call(document.querySelectorAll('.ct_list-of-content'), function(el) {
      el.classList.toggle('d-block');
      content_btn.classList.toggle('rotate-180');
    });
  });
}
