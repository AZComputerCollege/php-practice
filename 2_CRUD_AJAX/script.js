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
						<td><img src="./uploads/${product.thumbnail||""}" width="50"></td>
						<td>${product.category_name || ""}</td>
						<td>${product.subcategory_name || "N/A"}</td>
						<td>${product.pname}</td>
						<td>${product.qty}</td>
						<td>${product.pdescription || ""}</td>
						<td>${product.p_price}</td>
						<td>${product.s_price}</td>
						<td>${product.tax}</td>
						<td><span class="badge bg-primary">${product.is_active == 1 ? "Active" : "Inactive"}</span></td>
						<td>
                            <button class="btn btn-info btn-sm" onclick="editProduct(${product.id});">Edit</button>
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



function fetchCategories(category_id="") {

    console.log("calling fetchcategories==>",category_id);

    $.ajax({
        url: api_url + "/fetch-data.php",
        method: "GET",
        data: { "a": "fetchCategory" },
        success: function (res) {
            let response = JSON.parse(res);
            // console.log(response);
            if (response.status == 200) {
                let html = '<option value="">Select Category</option>';
                response.data.forEach(category => {
                    console.log(category_id, category.id);

                    let selected = category_id == category.id ?"selected":"";

                    console.log(selected);
                    html += `
                        <option value="${category.id}" ${selected}>${category.cname}</option>
                    `;
                });

                console.log(html);

                $("#productCats").html(html);
            }
        }
    });

}


// $('#productModal').on('shown.bs.modal', function () {
//     fetchCategories();
// });


function fetchSubcategories(category_id, subcategory_id=""){
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
                    let selected = (category.id==subcategory_id)?"selected":"";
                    html += `
                        <option value="${category.id}" ${selected}>${category.cname}</option>
                    `;
                });

                $("#productSubcats").html(html);
            }
        }
    });
}

$("#productCats").on("change", function () {
    let category_id = $("#productCats").val();
    fetchSubcategories(category_id);
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
            // console.log(res);
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


function editProduct(productId){
    // console.log("getting product id ==>", [productId]);
    if(productId){
        $.ajax({
            url: api_url + "/fetch-data.php",
            method: "GET",
            data: { "a": "fetchProduct", "product_id": productId },
            success: function (res) {
                let response = JSON.parse(res);

                let product = response.data;
                console.log(product);

                if (response.status == 200) {
                    $("#productModal").modal("show");
                    fetchCategories(product.category_id);
                    
                    fetchSubcategories(product.category_id, product.subcategory_id);

                    $("#pname").val(product.pname);

                    $("#product_id").val(product.id);
                }
            }
        });
    }else{
        console.error("Product ID not found"); 
    }



        // $("#productModal").modal("show");
}