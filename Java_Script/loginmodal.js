const modal2 = document.getElementById("modallogin");
const btn2 = document.getElementById("myBtn2");
const span2 = document.getElementsByClassName("close")[0];

btn2.onclick = () => modal.style.display = "block";
span2.onclick = () => modal.style.display = "none";
window.onclick = (event) => {
    if (event.target == modal) modal.style.display = "none";
};