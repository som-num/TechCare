var calendar;
var listCalendar;

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var listCalendarEl = document.getElementById('listCalendar');

  function getEventColor(status) {
    if (status === 'accepted') {
      return '#56b870';
    } else if (status === 'completed') {
      return '#3498db';
    } else if (status === 'denied') {
      return '#e74c3c';
    } else {
      return '#ffbb33'; // Default color
    }
  }


  // Main calendar with dayGridMonth view
  calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    selectable: true,
    select: function (info) {
      const start = info.start;
      const end = info.end;

      // Check for overlaps
      const existingEvents = calendar.getEvents();
      if (isOverlap(start, end, existingEvents)) {
        alert("The selected time slot overlaps with an accepted event.");
        calendar.unselect(); // Clear the selection
        return;
      }


    },
    
    events: {
      url: 'fetchEvents.php',
      method: 'GET',
      failure: function () {
        alert('There was an error while fetching events.');
      }
    },
    eventDidMount: function(info) {
      // Add Tippy.js tooltips to events
      tippy(info.el, {
        content: "Status: " + info.event.extendedProps.status || "pending", // Event description
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
      right: 'addEventButton,prev,next,today',
      center: 'title'
    },
    customButtons: {
      addEventButton: {
        text: 'Add Reservation',
        click: function () {
          openModal();
        }
      }
    }
  });

  // List calendar with listWeek view
  listCalendar = new FullCalendar.Calendar(listCalendarEl, {
    initialView: 'listWeek',
    views: {
      listDay: { buttonText: 'Day' },
      listWeek: { buttonText: 'Week' },
      listMonth: { buttonText: 'Month' }
    },
    eventDidMount: function(info) {
      // Add Tippy.js tooltips to events
      tippy(info.el, {
        content: `Location: ${info.event.extendedProps.description || 'No location available'}<br>Status: ${info.event.extendedProps.status || 'pending'}<br>Start: ${info.event.start.toLocaleString()}<br>End: ${info.event.end.toLocaleString()}`,
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
        text: 'My Bookings',  // The custom text you want to display
        click: function() {
       
        }
      }
    },
    events: {
      url: 'fetchByUser.php',
      method: 'GET',
      failure: function () {
        alert('There was an error while fetching events.');
      }
    },
  
  });

  // Render both calendars
  calendar.render();
  listCalendar.render();
});

function openModal() {
  document.getElementById('eventEntryModal').classList.add('show');
  document.getElementById('modalBackdrop').classList.add('show');
}

function closeModal() {
  document.getElementById('eventEntryModal').classList.remove('show');
  document.getElementById('modalBackdrop').classList.remove('show');
}

function isOverlap(start, end, events) {
  return events.some(event => {
    if (event.extendedProps.status === 'accepted') {
      const eventStart = new Date(event.start); // Ensure these are Date objects
      const eventEnd = new Date(event.end);

      return (
        (start >= eventStart && start < eventEnd) || // New event starts during existing event
        (end > eventStart && end <= eventEnd) ||     // New event ends during existing event
        (start <= eventStart && end >= eventEnd)     // New event completely overlaps existing event
      );
    }
    return false;
  });
}


function saveData() {
  const eventName = document.getElementById('event_name').value;
  const startTime = document.getElementById('event_start_time').value;
  const endTime = document.getElementById('event_end_time').value;
  const eventDate = document.getElementById('event_date').value;
  const location = document.getElementById('location').value;

  if (!eventName || !startTime || !endTime || !eventDate || !location) {
    alert("All fields are required! Please fill out every field.");
    return; // Stop further execution if validation fails
  }
  else if(startTime == endTime){
    alert("Start time and end time cannot be the same.")
    return;
  }
  const start = new Date(`${eventDate}T${startTime}`);
  const end = new Date(`${eventDate}T${endTime}`);
  const existingEvents = calendar.getEvents();

  // Check for overlaps
  if (isOverlap(start, end, existingEvents)) {
    alert("The selected time slot overlaps with an accepted event.");
    return; // Do not save the event
  }


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
        alert("Reservation added successfully!");
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