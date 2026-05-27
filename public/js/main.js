function toggleSearch() {
    const searchBar = document.getElementById('searchBar');
    if (searchBar) {
        searchBar.style.display = searchBar.style.display === 'none' ? 'block' : 'none';
    }
}

function switchLanguage(lang) {
    const url = new URL(window.location);
    url.searchParams.set('lang', lang);
    window.location = url;
}

function handleInquiry(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    
    document.getElementById('loading').style.display = 'block';
    
    fetch('/contact', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById('loading').style.display = 'none';
        if (data.success) {
            alert('Thank you! Your inquiry has been submitted.');
            form.reset();
        } else if (data.errors) {
            alert('Please fix the errors: ' + JSON.stringify(data.errors));
        }
    })
    .catch(err => {
        document.getElementById('loading').style.display = 'none';
        alert('Error submitting form');
    });
}

function handleContactInquiry(event) {
    event.preventDefault();
    handleInquiry(event);
}

function handleAddProduct(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    
    fetch('/admin/products', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            alert('Product added successfully!');
            location.reload();
        } else {
            alert('Error: ' + data.error);
        }
    });
}

function deleteProduct(id) {
    if (confirm('Are you sure?')) {
        fetch('/admin/products/' + id, { method: 'DELETE' })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                alert('Product deleted!');
                location.reload();
            }
        });
    }
}

function toggleAddForm() {
    const form = document.getElementById('addProductForm');
    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
}

function exportInquiries(format) {
    const startDate = document.getElementById('start_date')?.value;
    const endDate = document.getElementById('end_date')?.value;
    const url = '/admin/inquiries/export?format=' + format + 
        (startDate ? '&start_date=' + startDate : '') +
        (endDate ? '&end_date=' + endDate : '');
    window.location = url;
}
