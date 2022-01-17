const parentContainer = document.querySelector(".see-all");

parentContainer.addEventListener("click", (event) => {
  const current = event.target;

  const isReadMoreBtn = current.className.includes("see-all-button");

  if (!isReadMoreBtn) return;

  const currentText = event.target.parentNode.querySelector(".see-all-text");

  currentText.classList.toggle("see-all-text--show");

  current.textContent = current.textContent.includes("View All Notes") ? "View Less Notes" : "View All Notes";
});
