const openBtn = document.getElementById("openModel");
const closeBtn = document.getElementById("closeModel");
const modal = document.getElementById("model");

// Open modal
openBtn.addEventListener("click", function() {
    modal.style.display = "flex";
});

// Close modal
closeBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

// Close modal when clicking outside inner box
window.addEventListener("click", function(e) {
    if(e.target == modal) {
        modal.style.display = "none";
    }
});


const openBanquatBtn = document.getElementById("openBanquat");
const closeBanquatBtn = document.getElementById("closeBanquat");
const BanquatModal = document.getElementById("banquatmodel");

// Open modal
openBanquatBtn.addEventListener("click", function() {
    BanquatModal.style.display = "flex";
});

// Close modal
closeBanquatBtn.addEventListener("click", function() {
    BanquatModal.style.display = "none";
});

// Close modal when clicking outside inner box
window.addEventListener("click", function(e) {
    if(e.target == BanquatModal) {
        BanquatModal.style.display = "none";
    }
});