Dorkigniter Analysis - FOR CI2
===========

Codeigniter's Profiler is a very helpful tool for analyzing and debugging CI applications. Unfortunately, it doesn't play well with AJAX requests.

This set of tools allows for debugging AJAX by overriding the default Profiler library, and storing the profiler output in the database. The controller has a run-once function for creating the required table, and an override for the default CI_Controller that checks for the first admin account before enabling the profiler.

You can then use the /dorkanalyze/profiler function to display the last profiler record in a new browser tab, instead of at the end of each page. Refresh the page after making an AJAX request to see the profiler's output.

You can also cycle back through the profiler records by using /dorkanalyze/profiler/{id}. The current ID is shown in the top left hand corner.
