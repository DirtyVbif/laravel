const checkLocation = subject => {
  let my_regex = new RegExp(subject);

  if (my_regex.lastIndex != 0) { my_regex.lastIndex = 0; }
  
  return my_regex.test(window.location.pathname);
}