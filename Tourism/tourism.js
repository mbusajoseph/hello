function approve() {
    'use stric';
    let el = document.getElementById('approve');
    let orderId = el.getAttribute('data-approve');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'servicesController.php');
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById('response').innerHTML = this.responseText;
        }
    }
    xhr.send("approve=true&order="+orderId);
}
function cancelApproval() {
    'use strict';
    let el = document.getElementById('approve');
    let orderId = el.getAttribute('data-approve');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'servicesController.php');
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById('response').innerHTML = this.responseText;
        }
    }
    xhr.send("cancel=true&order="+orderId);
}
function cancelDelete() {
    'use strict';
    let el = document.getElementById('cancel');
    let packageId = el.getAttribute('data-package');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'servicesController.php');
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById('response-2').innerHTML = this.responseText;
        }
    }
    xhr.send("action=cancel&id="+packageId);
}
//jquery
$(document).ready(()=>{
    'use strict';
    $("#editPackageForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'servicesController.php',
            type: 'post',
            data: $(this).serializeArray(),
            beforeSend: () => {
                $(".before-1").removeClass('d-none');
                $(".edit-btn").attr('disabled', true);
            },
            success: (data) => {
                $("#response-2").html(data);
            },
            complete: () => {
                $(".before-1").addClass('d-none');
                $(".edit-btn").attr("disabled", false);
            }
        });
    });

    $("#deletePackageForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'servicesController.php',
            type: 'post',
            data: $(this).serializeArray(),
            beforeSend: () => {
                $(".before-2").removeClass('d-none');
                $(".delete-btn").attr('disabled', true);
            },
            success: (data) => {
                $("#response-2").html(data);
            },
            complete: () => {
                $(".before-2").addClass('d-none');
                $(".delete-btn").attr("disabled", false);
            }
        });
    });

    $("#save-package-btn").on('click', function(){
        $.ajax({
            url: 'servicesController.php',
            type: 'post',
            data: $("#addPackageForm").serializeArray(),
            beforeSend: () => {
                $(".before-3").removeClass('d-none');
                $("#save-package-btn").attr('disabled', true);
            },
            success: (data) => {
                $(".before-3").html(data);
            },
            complete: () => {
                $("#save-package-btn").attr("disabled", false);
            }
        });
    });

    $("#create-user-btn").on('click', function(){
        $.ajax({
            url: 'auth.php',
            type: 'post',
            data: $("#createUserForm").serializeArray(),
            beforeSend: () => {
                $(".before-4").removeClass('d-none');
                $("#create-user-btn").attr('disabled', true);
            },
            success: (data) => {
                $(".before-4").html(data);
            },
            complete: () => {
                $("#create-user-btn").attr("disabled", false);
            }
        });
    });

    $("#loginForm").on('submit', function(p) {
        p.preventDefault();
        $.ajax({
            url: 'auth.php',
            type: 'post',
            data: $(this).serializeArray(),
            beforeSend: ()=> {
                $(".login-btn").attr('disabled', true);
                $(".response").removeClass('d-none');
            },
            success: (feedBack) => {
                let res = JSON.parse(feedBack);
                if (res.code == 1) {
                    $(".response").addClass('alert alert-success fade show w-50');
                    $(".response").html(res.status);
                    window.location.href = "dashboard.php";
                }else {
                    $(".response").addClass('alert alert-warning fade show');
                    $(".response").html(res.status); 
                }
            }
        });
    });

});