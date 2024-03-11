var action;
var postSlug;

$(document).ready(function () {
    $("#error-alert").hide();
});

$("#cancel-button").click(function () {
    refreshForm();
});

$("#post-form").submit(function (e) {
    e.preventDefault();

    var formData = new FormData();
    formData.append("title", $("#title").val());
    formData.append("slug", $("#slug").val());
    formData.append("category_id", $("#category_id").val());
    formData.append("image", $("#image")[0].files[0]);
    formData.append("body", $("#body").val());

    var url = "";
    if (action === 1) {
        url = "/dashboard/posts/";
    } else if (action === 2) {
        url = `/dashboard/posts/${postSlug}`;
        formData.append("old_image", $("#old_image").val());
        formData.append("_method", "PUT");
    }

    ajaxSetup();

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var status = response.status;

            if (status === 200) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
                refreshForm();
                getPosts();
                $("#manage-tab").click();
            } else if (status === 400) {
                refreshErrors();

                $.each(response.errors, function (key, value) {
                    $(`#${key}`).addClass("is-invalid");
                    $(`#${key}-error`).html(value[0]).show();
                });
            }
        },
    });
});

let post_table = $("#post-table").DataTable({
    processing: true,
    paging: true,
    responsive: true,
    ajax: {
        url: "/dashboard/posts/getPosts",
        type: "GET",
        info: true,
        data: function (filter) {
            filter.title;
            filter.category;
        },
        dataSrc: function (response) {
            action = 1;
            generateAction();
            return response.data;
        },
    },
    columns: [
        { data: "no", width: "5%", className: "text-center" },
        { data: "title", width: "50%" },
        { data: "category", width: "30%", className: "text-center" },
        {
            data: "slug",
            width: "15%",
            className: "text-center",
            render: function (data, type, row, meta) {
                return actionButtons(data, row);
            },
            orderable: false,
        },
    ],
    fnInitComplete: function () {
        feather.replace();
    },
    fnDrawCallback: function () {
        feather.replace();
    },
});

function actionButtons(slug, row) {
    var response = "";
    response = `<td><span>
            <a href='/dashboard/posts/${slug}' class='badge bg-primary'><span data-feather='eye' class='text-white'></span></a>
            <button class='badge bg-warning border-0' onclick='getPost("${slug}")'><span data-feather='edit' class='text-white'></span></button>
            <button class='badge bg-danger border-0' onclick='deletePost("${slug}")'><span data-feather='trash-2' class="text-white"></span></button>
        </span></td>`;
    return response;
}

function generateAction() {
    if (action === 1) {
        $("#action, #action-button").html("Create");
    } else if (action === 2) {
        $("#action, #action-button").html("Update");
    }
}

$("#title").on("change", function () {
    fetch(`/dashboard/posts/checkSlug?title=${$("#title").val()}`)
        .then((response) => response.json())
        .then((data) => $("#slug").val(data.slug));
});

$("#image").on("change", function (e) {
    const IMAGE_PREVIEW = $(".img-preview");
    IMAGE_PREVIEW.addClass("d-block");
    let file = this.files[0];
    if (file) {
        const oFReader = new FileReader();
        oFReader.onload = function (oFREvent) {
            IMAGE_PREVIEW.attr("src", oFREvent.target.result);
        };
        oFReader.readAsDataURL(file);
        $(".custom-file-label").html(file.name);
    }
});

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
}

function getPosts() {
    post_table.ajax.reload();
}

function getPost(slug) {
    $.ajax({
        url: `/dashboard/posts/${slug}/edit`,
        type: "GET",
        success: function (response) {
            action = 2;
            postSlug = response.data.slug;
            generateAction();
            editForm(response.data);
        },
    });
}

function deletePost(slug) {
    Swal.fire({
        title: "Are you sure want to delete this data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            ajaxSetup();

            $.ajax({
                url: `/dashboard/posts/${slug}`,
                type: "DELETE",
                cache: false,
                success: function (response) {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success",
                    });
                    post_table.ajax.reload();
                },
            });
        }
    });
}

function editForm(data) {
    $("#form-tab").click();
    $("#title").val(data.title);
    $("#slug").val(data.slug);
    $("#category_id").val(data.category_id);
    $("#old_image").val(data.image);
    $("#post-thumbnail").attr("src", `/dist/images/post/${data.image}`);
    $(".custom-file-label").html(data.image);
    $("#body").val(data.body);
    $("trix-editor").val(data.body);
}

function refreshForm() {
    action = 1;
    generateAction();
    $("#manage-tab").click();
    $("#title").val("");
    $("#slug").val("");
    $("#category_id").val("select");
    $("#image").val("");
    $("#post-thumbnail").attr("src", "");
    $(".custom-file-label").html("Choose file");
    $("#body").val("");
    $("trix-editor").val("");
    $("#action-button").html("Create");
    refreshErrors();
}

function refreshErrors() {
    $("[id$='error']").hide();

    $("#post-form :input").each(function () {
        if ($(this).hasClass("is-invalid")) {
            $(this).removeClass("is-invalid");
        }
    });
}
