function hideModal() {
    window.addEventListener('hideModal', event => {
        console.log(event.detail.modalId);
        $('#' + event.detail.modalId).modal('hide');
    });
}

function showModal() {
    window.addEventListener('showModal', event => {
        $('#' + event.detail.modalId).modal('show');
    });
}

function selectCategory() {
    $('#filterCategory').select2({
        placeholder: "Select category",
        allowClear: true
    }).on('change', function (){
        let data = $(this).val();
        livewire.emit('setCategory', data)
    });
}

$(document).ready(function () {
    hideModal();
    showModal();
    selectCategory();
});
