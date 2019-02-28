# Simple Form Handling Example

## Basic example of sending a form and showing errors from backend validation(PHP example)

### Prerequisites

```
Clone this repository run on a local machine (XAMPP)
```

### Installing

Just install XAMPP and clone the repository. Change base_href if you change the folder name

```
Header.php => <base href="/forms/">
```

In assets/main.js you will find the function for data validation and requests. If you cloned the repository you can use the javascript function like this

```
$(document).on('submit', '#formIdHere', function(e) {
    FormToAjax(new FormData(this), 'route from backend to send the request', 'the method = POST/GET', e->parameter for preventing default action, 'register->index for errors','/redirect_url/');
});   

```
