// GET request
function _GET(apiEndpoint, successCallback, errorCallback) {
    $.ajax({
        url: apiEndpoint,
        type: 'GET',
        success: function (response) {
            if (successCallback) {
                successCallback(response);
            }
        },
        error: function (error) {
            if (errorCallback) {
                errorCallback(error);
            }
        }
    });
}

// GET request
function _GETById(apiEndpoint, id, successCallback, errorCallback) {
    var url = apiEndpoint;
    if (id) {
        url += '/' + id;
    }

    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            if (successCallback) {
                successCallback(response);
            }
        },
        error: function (error) {
            if (errorCallback) {
                errorCallback(error);
            }
        }
    });
}

// POST request
function _POST(apiEndpoint, body, successCallback, errorCallback) {
    $.ajax({
        url: apiEndpoint,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(body),
        success: function (response) {
            if (successCallback) {
                successCallback(response);
            }
        },
        error: function (error) {
            if (errorCallback) {
                errorCallback(error);
            }
        }
    });
}

// PUT request
function _PUT(apiEndpoint, body, id, successCallback, errorCallback) {
    if (!id) {
        console.error('PUT error: ID is required');
        return;
    }

    $.ajax({
        url: apiEndpoint + '/' + id,
        type: 'PUT',
        contentType: 'application/json',
        data: JSON.stringify(body),
        success: function (response) {
            if (successCallback) {
                successCallback(response);
            }
        },
        error: function (error) {
            if (errorCallback) {
                errorCallback(error);
            }
        }
    });
}

// DELETE request
function _DELETE(apiEndpoint, id, successCallback, errorCallback) {
    if (!id) {
        console.error('DELETE error: ID is required');
        return;
    }

    $.ajax({
        url: apiEndpoint + '/' + id,
        type: 'DELETE',
        success: function (response) {
            if (successCallback) {
                successCallback(response);
            }
        },
        error: function (error) {
            if (errorCallback) {
                errorCallback(error);
            }
        }
    });
}