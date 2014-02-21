<div class="message error"><p>This is a <b>TESTING PAGE</b>. Please do not mess with any events you may see on here.</p></div>

<!-- Calendar Controller #angular -->
<div id="directives-calendar" ng-controller="CalendarCtrl">
    <div class="page-header">
        <h1>Trinity Calendar</h1>
    </div>
    <section>
        <div>
            <h3>Events</h3>
            <p>Show the data binding between two differnet calendars using the same event sources.</p>
            <div class="calTools">
                <!-- <button type="button" ng-click="addEvent()"><span>Add New Event</span></button>
                <button type="submit" name="submit"><span>Save changes</span></button> -->

                <div class="alert-success calAlert" ng-show="alertMessage != undefined && alertMessage != ''">
                    <h4>{{alertMessage}}</h4>
                </div>

            </div>

           <!--     <div class="row">
                    <ul class="unstyled">
                        <li ng-repeat="e in events.events">
                            <div class="left">
                                <a class="close" ng-click="remove($index)">Delete</a>
                                 <b> <input type="text" ng-model="e.title"></b> 
                                 <i>({{e.start | date:"MMM dd"}} - {{e.end | date:"MMM dd"}})</i>
                            </div>
                        </li>
                    </ul>
                </div>  -->
                
                <div onload="renderCalender(myCalendar1);">
                    <div class="btn-group">
                        <button class="btn btn-success" ng-click="changeView('agendaDay', myCalendar1)"><span>Day View</span></button>
                        <button class="btn btn-success" ng-click="changeView('agendaWeek', myCalendar1)"><span>Week View</span></button>
                        <button class="btn btn-success" ng-click="changeView('month', myCalendar1)"><span>Month View</span></button>
                    </div>
                    <select class="inspectors" ng-change="filterInspectors()" ng-model="inspector" ng-options="i.name for i in inspectors"></select>
                    
                    <div class="calendar" ng-model="eventSources" calendar="myCalendar1" config="uiConfig.calendar" ui-calendar="uiConfig.calendar"></div>
                </div>
            </div>
            <div id="dialog" title="{{dialog_event.title}}" class="hide">
                <div class="clear"></div>
                <table class="margin-top">
                    <thead>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>All Day Event</th>
                        <th>Inspector</th>
                        <th>Adjuster</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{dialog_event.start | date:'medium'}}</td>
                        <td>{{dialog_event.end | date:'medium'}}</td>
                        <td>{{dialog_event.allday}}</td>
                        <td>{{dialog_event.inspector}}</td>
                        <td>{{dialog_event.adjuster}}</td>
                    </tr>
                </tbody>
                </table>

                <hr>
                <a href="/workorders/view/{{dialog_event.id}}">View Work Order</a>
            </div>
        <button type="button" ng-click="saveEvents()"><span>Save Calendar</span></button>
    </section>
</div>
<!-- End Calendar Controller #angular -->