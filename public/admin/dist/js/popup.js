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