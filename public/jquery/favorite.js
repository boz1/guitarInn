$("#actio213n-button").click(function(e) {
  e.preventDefault();
  var name = 5; 
  var last_name = 'blake';
  var dataString = 'name='+name+'&last_name='+last_name;
  $.ajax({
    type:'POST',
    data:dataString,
    url:'insert.php',
    success:function(data) {
      alert(data);
    }
  });
});
