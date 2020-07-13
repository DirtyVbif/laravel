$(document).ready(() => {
  if(checkLocation('news/article')) {
    const SELECT_BOX = new CategorySelection;
    SELECT_BOX.index();
  }
});