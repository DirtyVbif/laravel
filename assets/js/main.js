$(document).ready(() => {
  if($('#form-news-article').length) {
    const SELECT_BOX = new CategorySelection;
    SELECT_BOX.index();
  }
});