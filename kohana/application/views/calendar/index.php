<!-- Calendar Controller #angular -->
<div id="directives-calendar" class="margin-top" ng-controller="CalendarCtrl">
    <div class="section">
        <div class="box">
            <div class="title">Calendar Options</div>
            <div class="content">
                <div class="row">
                <div onload="renderCalender(myCalendar1);" class="row">
                    <div>
                        <button class="btn btn-success" ng-click="changeView('agendaDay', myCalendar1)"><span>Day View</span></button>
                        <button class="btn btn-success" ng-click="changeView('agendaWeek', myCalendar1)"><span>Week View</span></button>
                        <button class="btn btn-success" ng-click="changeView('month', myCalendar1)"><span>Month View</span></button>
                    </div>
                </div>
            </div>
            <hr>
                <div class="row inspector-row">
                    <label for="inspectors">Filter by Inspector: </label>

                    <div>
                        <select name="inspectors[]" class="inspectors right" ng-change="filterInspectors()" ng-model="inspector" ng-options="i.name for i in inspectors"></select>
                        <hr>
                        <a href="#" ng-click="reset_inspector()">Reset Calendar</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <div class="calendar" ng-model="eventSources" calendar="myCalendar1" config="uiConfig.calendar" ui-calendar="uiConfig.calendar"></div>
            <div id="dialog" title="{{dialog_event.title}}" class="hide">
                <div class="clear"></div>
                <table class="margin-top">
                    <thead>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>All Day Event</th>
                        <th>Policy Holder</th>
                        <th>Adjuster</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{dialog_event.start | date:'medium'}}</td>
                        <td>{{dialog_event.end | date:'medium'}}</td>
                        <td>{{dialog_event.allday}}</td>
                        <td>{{dialog_event.policy_holder}}</td>
                        <td>{{dialog_event.adjuster}}</td>
                    </tr>
                </tbody>
                </table>

                <hr>
                <a href="/workorders/view/{{dialog_event.id}}">View Work Order</a>
            </div>
</div>
<!-- End Calendar Controller #angular -->