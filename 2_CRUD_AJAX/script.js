const tbody = $("#product-body").html();

const api_url = "https://php-classes.test/2_CRUD_AJAX/api/";

function fetchAllData() {
    $.ajax({
        url: api_url + "/view.php",
        method: "GET",
        success: function (res) {
            let response = JSON.parse(res);
            // console.log(response.data);

            // console.log(response);
            if(response.status == 200){
                let innerHtml = '';
                response.data.forEach(product => {
                    console.log(product);
                    innerHtml += `<tr id="product_${product.id}">
						<td>Image</td>
						<td>${product.category_id}</td>
						<td>Subcategory</td>
						<td>${product.pname}</td>
						<td>${product.qty}</td>
						<td>${product.pdescription}</td>
						<td>${product.p_price}</td>
						<td>${product.s_price}</td>
						<td>${product.tax}</td>
						<td>${product.is_active==1?"Active":"Inactive"}</td>
						<td>Actions</td>
					</tr>
                    `; 
                });

               $("#product-body").html(innerHtml);
            }
        }
    });
}

fetchAllData();