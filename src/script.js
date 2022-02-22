$(document).ready(function () {
  $(".add-to-cart").click(function (e) {
    e.preventDefault();
  //  console.log($(this).data("id"));
    $.ajax({
      method: "POST",
      url: "function.php",
      data: { id: $(this).data("id"), action: "add" },
      dataType: "JSON",
    }).done(function (data) {
        displayCart(data);
    });
  });
  $("body").on("click",".deleteBtn",function(e) {
    e.preventDefault();
    console.log($(this).attr("data")) ;
    $.ajax({
    
      method: "POST",
      url: "function.php",
      data: { id: $(this).attr("data"), action: "delete" },
      dataType: "JSON",
    }).done(function (data) {
        displayCart(data);
    });
  });
});
function displayCart(data){
 var nm = `
 <table>
  <tr>
    <th>Product Id</th>
    <th>Product Name</th>
    <th>Product Quantity</th>
    <th>Product Price</th>
    <th>Action</th>
  </tr>`
    for (let index = 0; index < data.length; index++) {
      nm += `
      <tr>
      <td>${data[index].id}</td>
      <td>${data[index].name}</td>
      <td><input type="number"  class="inputBtn"><button data-pi="${data[index].id}" type="submit" class ="submitBtn" >Add quantity</button></td>
      <td>${data[index].price}</td>
      <td><a href='#' data="
      ${data[index].id}
      " class='deleteBtn'>X</a></td>
      </tr>`;
      
    }
    nm +=`</table>`
    $("#table").html(nm);
}
