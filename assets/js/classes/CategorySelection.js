class CategorySelection
{
  constructor()
  {
    // class settings
    this.find = {
      box: 'js-category-selection-box',
      select: 'js-select-category',
      view: 'js-selected-categories'
    };

    // class fields
    this.$box = null;
    this.$select = null;
    this.$view = null;
    this.$input = null;
    this.$item = $('<div/>', {class:'js-selected-category'});
    this.$cross = $('<span/>', {text:'×', class:'js-selected-category__del'});
    this.data = {};
  }

  index()
  {
    this.$box = $('.' + this.find.box);
    if(!this.$box.length) { return; }
    this.$select = this.$box.find('.' + this.find.select);
    this.$view = this.$box.find('.' + this.find.view);
    this.$input = this.$box.find('input[name=categories]');

    this._initCategories();
  }

  _initCategories()
  {
    let value = this.$input.val();

    if(!value) {
      this.data.values = [];
    } else {
      this.data.values = value.split(',');
      for (let cat_id of this.data.values) {
        this._addIdToView(cat_id);
        this._updateInput();
      }
    }

    this.$select.on('change', () => { this._setCategory() });
  }

  _setCategory()
  {
    let cat_id = this.$select.val();
    this._addIdToView(cat_id);
    this._addIdToInput(cat_id);
  }

  _hideCategory(cat_id)
  {
    let $option = this.$select.find('option[value='+cat_id+']');
    $option.attr('hidden', '');
    this.$select.val(0);
    return $option.text();
  }

  _unhideCategory(cat_id)
  {
    this.$select.find('option[value='+cat_id+']')
      .removeAttr('hidden');
    this.$select.val(0);
  }

  _addIdToView(cat_id)
  {
    let name = this._hideCategory(cat_id);
    let $new_item = this.$item.clone();
    let $new_cross = this.$cross.clone();
    $new_item.text(name)
      .append($new_cross)
      .appendTo(this.$view)
      .attr('data-id', cat_id);
    $new_cross.on('click', event => { this._unsetCategory(event) });
  }

  _addIdToInput(cat_id)
  {
    this.data.values.push(cat_id);
    this._updateInput();
  }

  _unsetId(cat_id)
  {
    let i = this.data.values.indexOf(cat_id);
    if (i > -1) {
      this.data.values.splice(i, 1);
    }
    this._updateInput();
  }

  _unsetCategory(event)
  {
    let $item = $(event.target).parent();
    let cat_id = $item.attr('data-id');
    $item.remove();
    this._unhideCategory(cat_id);
    this._unsetId(cat_id);
  }

  _updateInput()
  {    
    this.$input.val(this.data.values.join(','));
  }
}