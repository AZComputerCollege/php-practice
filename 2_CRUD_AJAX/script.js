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
            if (response.status == 200) {
                let innerHtml = '';
                response.data.forEach(product => {
                    // console.log(product);
                    innerHtml += `<tr id="product_${product.id}">
						<td>Image</td>
						<td>${product.category_name || ""}</td>
						<td>${product.subcategory_name || ""}</td>
						<td>${product.pname}</td>
						<td>${product.qty}</td>
						<td>${product.pdescription || ""}</td>
						<td>${product.p_price}</td>
						<td>${product.s_price}</td>
						<td>${product.tax}</td>
						<td><span class="badge bg-primary">${product.is_active == 1 ? "Active" : "Inactive"}</span></td>
						<td>
                            <button class="btn btn-info btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
					</tr>
                    `;
                });

                $("#product-body").html(innerHtml);
            }
        }
    });
}

fetchAllData();



function fetchCategories() {
    $.ajax({
        url: api_url + "/fetch-data.php",
        method: "GET",
        data: { "a": "fetchCategory" },
        success: function (res) {
            let response = JSON.parse(res);
            console.log(response);
            if (response.status == 200) {
                let html = '<option value="">Select Category</option>';
                response.data.forEach(category => {
                    html += `
                        <option value="${category.id}">${category.cname}</option>
                    `;
                });

                console.log(html);

                $("#productCats").html(html);
            }
        }
    });

}


$('#productModal').on('shown.bs.modal', function () {
    fetchCategories();
});


$("#productCats").on("change", function () {
    let category_id = $("#productCats").val();
    console.log(category_id);
    $.ajax({
        url: api_url + "/fetch-data.php",
        method: "GET",
        data: { "a": "fetchSubcategory", "cat_id": category_id },
        success: function (res) {
            let response = JSON.parse(res);
            // console.log(response);
            if (response.status == 200) {
                let html = '<option value="">Select Subcategory</option>';
                response.data.forEach(category => {
                    html += `
                        <option value="${category.id}">${category.cname}</option>
                    `;
                });

                $("#productSubcats").html(html);
            }
        }
    });
})


$("#psubmit").on("click", function (e) {
    e.preventDefault();

    let form = document.querySelector("#productForm");
    let formData = new FormData(form);
    $.ajax({
        url: api_url + "/create.php",
        method: "POST",
        data: formData,
        contentType:false,
        processData: false,  
        success: function (res) {
            console.log(res);
            let response = JSON.parse(res);
            // console.log(response);
            if (response.status == 200) {
               $("#productForm")[0].reset();
                $("#productModal").modal("hide");
                fetchAllData();

                
            }
        }
    });

});
