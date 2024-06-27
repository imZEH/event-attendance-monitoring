// GET request
function _GET(apiEndpoint, id) {
    var url = apiEndpoint;
    if (id) {
        url += '/' + id;
    }

    $.ajax({
        url: url,
        type: 'GET',
        success: function(response) {
            console.log('GET success:', response);
            return response;
        },
        error: function(error) {
            console.error('GET error:', error);
            return error
        }
    });
}

// POST request
function _POST(apiEndpoint, body) {
    $.ajax({
        url: apiEndpoint,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(body),
        success: function(response) {
            console.log('POST success:', response);
        },
        error: function(error) {
            console.error('POST error:', error);
        }
    });
}

// PUT request
function _PUT(apiEndpoint, body, id) {
    if (!id) {
        console.error('PUT error: ID is required');
        return;
    }

    $.ajax({
        url: apiEndpoint + '/' + id,
        type: 'PUT',
        contentType: 'application/json',
        data: JSON.stringify(body),
        success: function(response) {
            console.log('PUT success:', response);
        },
        error: function(error) {
            console.error('PUT error:', error);
        }
    });
}

// DELETE request
function _DELETE(apiEndpoint, id) {
    if (!id) {
        console.error('DELETE error: ID is required');
        return;
    }

    $.ajax({
        url: apiEndpoint + '/' + id,
        type: 'DELETE',
        success: function(response) {
            console.log('DELETE success:', response);
        },
        error: function(error) {
            console.error('DELETE error:', error);
        }
    });
}
