# AutomateWoo Subscription Rule - Failed Orders in Previous X Hours

Extends the functionality of AutomateWoo with 3 custom "Shop" rules which check for failed orders over the last 24 hours, 6 hours and 1 hour.

## Usage

Input your desired number of failed orders to check against. If your store has created that number of failed orders in that time period, the rule will return true, based on your comparator.

**NOTE:** If you are using this with an _Order Status Change > Failed_ trigger, this rule doesn't include that order, so you will want to include 1 fewer number of failed orders. e.g. if you are checking for 10 failed orders, you will want to set the number at 9, since the rule doesn't include the current order that you're checking against.

## Support

This plugin is provided without any support or guarantees of functionality. If you'd like to contribute, feel free to open a PR on this repo. Please test thoroughly before deploying to a production site.
