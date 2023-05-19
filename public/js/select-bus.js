// var selectedBus = [];

// function selectIdBus(armada_bus_id) {
//   selectedBus.push(armada_bus_id);
//   console.log(selectedBus); // You can view the selected cards in the browser console
// }

// $(document).ready(function() {
//   $('.select-button').click(function() {
//     var cardTitle = $(this).closest('.card-body').find('.card-title').text();
//     var selectedList = $('.selected-list');
    
//     if (!selectedList.find('li:contains("' + cardTitle + '")').length) {
//       selectedList.append('<li>' + cardTitle + '</li>');
//     }
//   });
  
//   $('.selected-list').select2();
// });

// gunakan ini 
// function selectItem(itemId) {
//   var selectedList = $('.selected-list');
  
//   if (!selectedList.find('li:contains("' + itemId + '")').length) {
//     selectedList.append('<li>' + itemId + ' <button class="btn btn-sm btn-danger remove-button" onclick="removeItem(this)">Remove</button></li>');
//   }
  
//   $('.selected-list').select2();
// }

// function removeItem(button) {
//   $(button).closest('li').remove();
// }

// all good from here
// function selectItem(itemId, nama) {
//   var selectedItem = $('#selected-item');

//   console.log(itemId)
//   console.log(nama)
  
//   if (!selectedItem.find('div:contains("' + itemId + '")').length) {
//     selectedItem.append('<div class="col-2" id="selected-bus"><div class="input-group mb-3"><input type="text" disabled class="form-control" value="'+ nama +'" aria-describedby="button-addon2"><input type="hidden" name="armada_bus_id" value="' + itemId + '"><button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="removeItem(this)">x</button></div></div>');
//   }
// }

// function removeItem(button) {
//   $('#selected-bus').remove();
// }

var arrSelectedIdBus = [];
console.log(arrSelectedIdBus);

function selectBus(bus_id, bus_nama) {
  var containerSelectedBus = $('#container-selected-bus');

  console.log(bus_id)
  console.log(bus_nama)
  
  if (!containerSelectedBus.find('div:contains("' + bus_id + '")').length) {
    containerSelectedBus.append('<div class="col-2" id="selected-bus' + bus_id + '"><div class="input-group mb-3"><input type="text" disabled class="form-control" value="'+ bus_nama +'" aria-describedby="button-addon2"><button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="removeItem(' + bus_id + ')">x</button></div></div>');
    $('#item-bus'+ bus_id).addClass('shadow-lg');
    $('#button-item-bus'+ bus_id).prop('disabled', true);
    $('#button-item-bus'+ bus_id).html("Terpilih");
    arrSelectedIdBus.push(bus_id);
    updateInputValue();
  }
  console.log(arrSelectedIdBus);
}

function removeItem(bus_id) {
  $('#selected-bus'+ bus_id).remove();
  $('#item-bus'+ bus_id).removeClass('shadow-lg')
  $('#button-item-bus'+ bus_id).prop('disabled', false);
  $('#button-item-bus'+ bus_id).html("Pilih");

  for (var i = arrSelectedIdBus.length - 1; i >= 0; i--) {
    if (arrSelectedIdBus[i] === bus_id) {
      arrSelectedIdBus.splice(i, 1); // Remove 1 value at index i
    }
  }
  updateInputValue();
  console.log(arrSelectedIdBus);
}

function updateInputValue() {
  var inputField = $('#selected_armada_bus_id');
  inputField.val(arrSelectedIdBus.join(', '));
}

// function updateInputValue(){
//   // identify the id of hidden input 
//   var inputField = $('#selected_armada_bus_id');  
//   // make arrSelectedIdBus to string
//   var arrSelectedIdBusString = JSON.stringify(arrSelectedIdBus);  
//   // remove '[' and ']' from string
//   var SelectedIdBusString = arrSelectedIdBusString.replace(/[\[\]]/g, ''); 
//   // inject the string that already removed to input value 
//   inputField.val(SelectedIdBusString);

//   //we dont need '[',']' because laravel need raw number and comma
// }

// function updateInputValue() {
//   var inputField = $('#selected_armada_bus_id');
//   inputField.val(JSON.stringify(arrSelectedIdBus));
// }