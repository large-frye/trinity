<div id="inspection-form" class="section">
    <?php if (isset($success)) { 
        echo "<div class=\"message info\">
                  <p>" . $success . "</p>
              </div>";
    } ?>

    <?php if (isset($errors)) { 
        echo "<div class=\"message error\">
                  <p>There were some errors on your form submission. Please fix them before submitting again.</p>
              </div>";
    } ?>

<div ng-controller="invoiceCtrl" class="ng-cloak" ng-cloak>

<form name="invoiceOptions" ng-submit="addItems()" snovalidate>

<div class="section" ng-show="successMsg">
    <div class="message info">
        <span>You have upated your invoice. Click on "View Invoice" below to prepare your report for a PDF deliverable.</span>
    </div>
</div>

<div class="section">
    <div class="box">
        <div class="title">Invoice: Pre-populated Options</div>
        <div class="content">
            <div class="row">
                <div class="invoice-options">
                    <div class="form-group" ng-repeat="item in items">
                        <input type="checkbox" name="invoiceOptions[]" ng-model="item.checked" ng-checked="item.checked" ng-click="addItem(item)" />
                        <label ng-model="item.name">{{ item.name }}</label>
                        <input type="text" name="invoice_option" ng-model="item.cost" class="fix-invoice-option" />
                    </div>
                    
                    <div class="cl"></div>
                </div>
            </div>

            <div class="row">
                <button type="submit" name="addToReport" class="left"><span>Add to Report <span ng-show="loading">Adding Items...</span></span></button>
                <div ng-show="addToReportBtn" class="left margin-left">
                    <button type="button" ng-click="redirect('/invoice/generate/<?php echo Request::current()->param('id') ?>')">
                        <span>View Invoice</span>
                    </button>
                </div>

                <div class="cl"></div>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="box">
        <div class="title">Add a new invoice option</div>
        
        <div class="content">
            <table cellspacing="0" cellpadding="0" border="0" class="multi-row-table">
                <thead>
                    <tr>
                        <th>Description</th><th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="newItemName" ng-model="add.item.name"></td>
                        <td>
                            <input type="number" name="newItemAmt" ng-model="add.item.cost" ng-required="invoiceOptions.newItemAmt.$dirty">
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="error" ng-show="invoiceOptions.newItemAmt.$dirty && invoiceOptions.newItemAmt.$invalid">
                Your amount for this item needs to be a number.
            </p>
                
            <div class="row">
                <button type="button" ng-click="pushItem(add.item)" ng-disabled="!invoiceOptions.$valid"><span>Add Item</span></button>
            </div>
        </div>
    </div>
</div>

</form>

</div>