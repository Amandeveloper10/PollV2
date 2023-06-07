<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script>
  // Initialize Firebase
  /*Update this config*/
  var config = {
  apiKey: "AIzaSyBdyrEAeLFeIqfaNPfL_mSHoaJb4QHVKro",
  authDomain: "hrpayroll-847be.firebaseapp.com",
  databaseURL: "https://hrpayroll-847be.firebaseio.com",
  projectId: "hrpayroll-847be",
  storageBucket: "hrpayroll-847be.appspot.com",
  messagingSenderId: "553676957818",
  appId: "1:553676957818:web:976ada4a82d225e60873c3",
  measurementId: "G-FY9S1CBDZZ"
  };
  firebase.initializeApp(config);

	// Retrieve Firebase Messaging object.
	const messaging = firebase.messaging();
	messaging.requestPermission()
	.then(function() {
	  console.log('Notification permission granted.');
	  // TODO(developer): Retrieve an Instance ID token for use with FCM.
	  if(isTokenSentToServer()) {
	  	console.log('Token already saved.');
	  } else {
	  	getRegToken();
	  }
	  //getRegToken();

	})
	.catch(function(err) {
	  console.log('Unable to get permission to notify.', err);
	});

	function getRegToken(argument) {
		messaging.getToken()
		  .then(function(currentToken) {
		    if (currentToken) {
		      saveToken(currentToken);
		      console.log(currentToken);
		      setTokenSentToServer(true);
		    } else {
		      console.log('No Instance ID token available. Request permission to generate one.');
		      setTokenSentToServer(false);
		    }
		  })
		  .catch(function(err) {
		    console.log('An error occurred while retrieving token. ', err);
		    setTokenSentToServer(false);
		  });
	}

	function setTokenSentToServer(sent) {
	    window.localStorage.setItem('sentToServer', sent ? 1 : 0);
	}

	function isTokenSentToServer() {
	    return window.localStorage.getItem('sentToServer') == 1;
	}

	function saveToken(currentToken) {
		$.ajax({
			url: "<?=base_url('Admin/saveToken')?>",
			method: 'post',
			data: 'token=' + currentToken
		}).done(function(result){
			console.log(result);
		})
	}

	messaging.onMessage(function(payload) {
	  console.log("Message received. ", payload);
	  notificationTitle = payload.data.title;
	  notificationOptions = {
	  	body: payload.data.body,
	  	icon: payload.data.icon,
	  	image:  payload.data.image
	  };
	  var notification = new Notification(notificationTitle,notificationOptions);
	});
</script>