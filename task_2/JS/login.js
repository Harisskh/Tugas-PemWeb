function handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const queryString = new URLSearchParams(formData).toString();
    window.location.href = `Profile.html?${queryString}`;
    return false;
}