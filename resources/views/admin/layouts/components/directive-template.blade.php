<script type="text/ng-template" id="th-sortable-directive">
    <div ng-click="type = sortBy; reverse = !reverse;" class="sortable"
         ng-class="{'sort': type == sortBy}" style="width:%%width%%;">
        %%title%%
        <span ng-show="type == sortBy && !reverse"><i
                    class="glyphicon glyphicon-sort-by-alphabet"></i></span>
        <span ng-show="type == sortBy && reverse"><i
                    class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
    </div>
</script>