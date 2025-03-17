var calendar;
var listCalendar;

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var listCalendarEl = document.getElementById('listCalendar');

  function getEventColor(status) {
    if (status === 'accepted') {
      return '#56b870';
    } else if (status === 'pending') {
      return '#ffbb33';
    } else if (status === 'denied') {
      return '#e74c3c';
    } else {
      return '#3498db'; // Default color
    }
  }

  // Main calendar with dayGridMonth view
  calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    selectable: true,
    
    events: {
      url: 'fetchAllAdmin.php',
      method: 'GET',
      failure: function () {
        alert('There was an error while fetching events.');
      }
    },
    eventDidMount: function(info) {
      // Add Tippy.js tooltips to events
      tippy(info.el, {
        content: `Name: ${info.event.extendedProps.userName}<br>Location: ${info.event.extendedProps.description || 'No location available'}<br>Status: ${info.event.extendedProps.status || 'No status available'}<br>Start: ${info.event.start.toLocaleString()}<br>End: ${info.event.end.toLocaleString()}`,
        allowHTML:true,
        placement: 'top',
        theme: 'light',
        animation: 'fade',
        arrow: true,
      });
      const status = info.event.extendedProps.status;
      const eventColor = getEventColor(status);

      info.el.style.backgroundColor = eventColor; // Set background color of event
      info.el.style.borderColor = eventColor; // Optionally set border color
    },
    headerToolbar: {
      left:'',
      right: 'prev,next,today',
      center: 'title'
    },
  });

  listCalendar = new FullCalendar.Calendar(listCalendarEl, {
    initialView: 'listWeek',
    views: {
      listDay: { buttonText: 'Day' },
      listWeek: { buttonText: 'Week' },
      listMonth: { buttonText: 'Month' }
    },
    eventDidMount: function(info) {
      tippy(info.el, {
        content: `Name: ${info.event.extendedProps.userName}<br>Location: ${info.event.extendedProps.description || 'No location available'}<br>Status: ${info.event.extendedProps.status || 'No status available'}<br>Start: ${info.event.start.toLocaleString()}<br>End: ${info.event.end.toLocaleString()}`,
        allowHTML:true,
        placement: 'top',
        theme: 'light',
        animation: 'fade',
        arrow: true,
      });
      const status = info.event.extendedProps.status;
      const eventColor = getEventColor(status);

      info.el.style.backgroundColor = eventColor; // Set background color of event
      info.el.style.borderColor = eventColor; // Optionally set border color
    },
    headerToolbar: {
      left: 'customTextButton',
      right: 'listDay,listWeek,listMonth,prev,next,today',
      center: 'title'
    },
    customButtons: {
      customTextButton: {
        text: 'All Bookings',  // The custom text you want to display
        click: function() {
       
        }
      }
    },
    events: {
      url: 'fetchAllAdmin.php',
      method: 'GET',
      failure: function () {
        alert('There was an error while fetching events.');
      }
    },
  
  });
  calendar.on('eventClick', function(info) {
    console.log(info.event);
    showEventDetails(info.event);
  });
  listCalendar.on('eventClick', function(info) {
    showEventDetails(info.event);
  });
  

  // Render both calendars
  calendar.render();
  listCalendar.render();
});

function openModal() {
  document.getElementById('eventModal').classList.add('show');
  document.getElementById('modalBackdrop').classList.add('show');
}

function closeModal() {
  document.getElementById('eventModal').classList.remove('show');
  document.getElementById('modalBackdrop').classList.remove('show');
}

function saveData() {
  const eventName = document.getElementById('event_name').value;
  const startTime = document.getElementById('event_start_time').value;
  const endTime = document.getElementById('event_end_time').value;
  const eventDate = document.getElementById('event_date').value;
  const location = document.getElementById('location').value;

  const eventData = {
    title: eventName,
    start: eventDate + 'T' + startTime,
    end: eventDate + 'T' + endTime,
    description: location,
    allDay: false,
  };
  const saveData = {
    title: eventName,
    date: eventDate,
    start: startTime,
    end: endTime,
    description: location,
    allDay: false,
  };

  console.log(eventData);

  calendar.addEvent(eventData);
  listCalendar.addEvent(eventData);

  fetch("calendarData.php", {
    method: "POST",
    headers: { "Content-Type": "application/json; charset=utf-8" },
    body: JSON.stringify(saveData)
  }).then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log(data.message);
      } else {
        console.error("Error adding reservation:", data.message);
      }
    })
    .catch(error => console.error("Error:", error));
}

function getData() {
  fetch("calendarData.php", {
    method: "POST",
    headers: { "Content-Type": "application/json; charset=utf-8" },
    body: JSON.stringify({ fetchData: true })
  }).then(response => response.json())
    .then(data => {
      console.log("Fetched Reservations:", data);
      data.forEach(reservation => {
        console.log(`Service: ${reservation.service_type}, Date: ${reservation.date}`);
      });
    }).catch(error => console.error("Error fetching data:", error));
}

function showEventDetails(event) {
    // Assuming you have a modal structure in your HTML
    openModal();
    const modal = document.getElementById('eventModal');

  
    // Populate modal fields with event details
    document.getElementById('modalUserName').innerText = event.extendedProps.userName;
    document.getElementById('modalEventName').innerText = event.title;
    document.getElementById('modalEventDate').innerText = event.start.toISOString().split('T')[0];
    document.getElementById('modalStartTime').innerText = event.start.toLocaleTimeString();
    document.getElementById('modalEndTime').innerText = event.end.toLocaleTimeString();
    document.getElementById('modalLocation').innerText = event.extendedProps.description || 'No location available';
  
    // Set the current status in the dropdown
    const statusDropdown = document.getElementById('eventStatus');
    statusDropdown.value = event.extendedProps.status || 'pending';
  
    // Save the event ID for updating the status later
    modal.dataset.eventId = event.id;
  
 
  }
  
 
  function updateEventStatus() {
    const eventId = document.getElementById('eventModal').dataset.eventId;
    const newStatus = document.getElementById('eventStatus').value;
    console.log(eventId);
    console.log(newStatus);
  
    fetch("updateEventStatus.php", {
      method: "POST",
      headers: { "Content-Type": "application/json; charset=utf-8" },
      body: JSON.stringify({ id: eventId, status: newStatus })
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert("Event status updated successfully!");
        //   closeModal();
  
          // Optionally, update the event on the calendar
          const event = calendar.getEventById(eventId);
          if (event) {
            event.setExtendedProp('status', newStatus);
          }
        } else {
          alert("Error updating event status: " + data.message);
        }
      })
      .catch(error => console.error("Error:", error));

      window.location.reload();
  }
    
  function deleteEvent() {
    const modal = document.getElementById("eventModal");
    const eventId = modal.getAttribute("data-event-id");
  
    if (confirm("Are you sure you want to delete this event?")) {
      fetch("deleteEvent.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: eventId }),
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Event deleted successfully!");
      
            window.location.reload();
            closeModal();
          } else {
            alert("Failed to delete event.");
          }
        })
        .catch(error => console.error("Error:", error));
    }
  }
  