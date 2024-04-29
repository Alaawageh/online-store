// Initialize Pusher and subscribe to the 'orders' channel
var pusher = new Pusher('28d418afce1d23b732e8', {
    encrypted: true,
    cluster: 'ap1'
});

var channel = pusher.subscribe('orders');

// Function to update notifications and details
function updateNotificationsAndDetails(data) {
    var date = new Date(data.order.created_at);
    var year = date.getFullYear();
    var month = date.getMonth() + 1; 
    var day = date.getDate();
    var notificationsWrapper = $('.notify');
    var notificationsCountElem = notificationsWrapper.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul.list');
    var existingNotifications = notifications.html();
    var readerStatusClass = data.order.reader_status ? '' : 'text-bold-600';
    var newNotificationHtml = `
    <li data-id="${data.order.id}" class="media mail-read" style="${data.order.reader_status ? 'background-color: #FFFFFF;' : 'background-color: #DAE1E7;color: black'}">
        <div class="media-left pr-50">
            <div class="avatar">
                <img class="avatar-content" src="" >
            </div>
            <div class="user-action">
            </div>
        </div>
        <div class="media-body">
            <div class="user-details">
                <div class="mail-items">
                    <h5 class="list-group-item-heading ${readerStatusClass} mb-25">${data.order.first_name}</h5>
                </div>
                <div class="mail-meta-item">
                    <span class="float-right">
                        <span class="mr-1 bullet bullet-success bullet-sm"></span><span class="mail-date">${year}-${month}-${day}</span>
                    </span>
                </div>
            </div>
            <div class="mail-message">
                <p class="list-group-item-text truncate mb-0">
                    <strong> New Order For More Details
                </strong>  
                </p>
            </div>
        </div>
    </li>
    `;
    notifications.html(newNotificationHtml + existingNotifications);

    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
}

// Bind to the 'my-event' on the 'orders' channel
channel.bind('my-event', function(data) {
    updateNotificationsAndDetails(data);
    location.reload(true);
});

// Handle click event on '.mail-read' elements
$(document).on('click', '.mail-read', function () {
    var id = $(this).data('id');
    $.ajax({
        url: window.base_url+'/admin/email/'+id,
        success: function(data){
            $('#Details').append(data);
        }
    });
});
