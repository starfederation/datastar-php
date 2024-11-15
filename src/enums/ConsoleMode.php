<?php

namespace starfederation\datastar\enums;

/**
 * This class is auto-generated, do not modify.
 */
enum ConsoleMode: string
{
    // Writes an error message to the console if the assertion is false. If the assertion is true, nothing happens.
    case Assert = 'assert';

    // Clears the console if the console allows it. A graphical console, like those running on browsers, will allow it; a console displaying on the terminal, like the one running on Node, will not support it, and will have no effect (and no error).
    case Clear = 'clear';

    // Logs the number of times that this particular call to count() has been called.
    case Count = 'count';

    // Resets counter used with console.count().
    case CountReset = 'countReset';

    // Outputs a message to the console at the &#39;debug&#39; log level. The message is only displayed to the user if the console is configured to display debug output. In most cases, the log level is configured within the console UI. This log level might correspond to the Debug or Verbose log level.
    case Debug = 'debug';

    // Displays a list of the properties of the specified JavaScript object. In browser consoles, the output is presented as a hierarchical listing with disclosure triangles that let you see the contents of child objects. Unlike other logging methods, console.dir() does not attempt to pretty-print the object. For example, if you pass a DOM element to console.dir(), it will not be displayed like in the element inspector, but will instead show a list of properties.
    case Dir = 'dir';

    // Displays an interactive tree of the descendant elements of the specified XML/HTML element. If it is not possible to display as an element the JavaScript Object view is shown instead. The output is presented as a hierarchical listing of expandable nodes that let you see the contents of child nodes.
    case Dirxml = 'dirxml';

    // Outputs a message to the console at the &#39;error&#39; log level.
    case Error = 'error';

    // Creates a new inline group in the Web console log, causing any subsequent console messages to be indented by an additional level, until console.groupEnd() is called.
    case Group = 'group';

    // Creates a new inline group in the console. Unlike console.group(), however, the new group is created collapsed. The user will need to use the disclosure button next to it to expand it, revealing the entries created in the group. Call console.groupEnd() to back out to the parent group.
    case GroupCollapsed = 'groupCollapsed';

    // Exits the current inline group in the console.
    case GroupEnd = 'groupEnd';

    // Outputs a message to the console at the &#39;info&#39; log level.
    case Info = 'info';

    // Outputs a message to the console.
    case Log = 'log';

    // Displays tabular data as a table.
    case Table = 'table';

    // Starts a timer you can use to track how long an operation takes. You give each timer a unique name, and may have up to 10,000 timers running on a given page. When you call console.timeEnd() with the same name, the browser will output the time, in milliseconds, that elapsed since the timer was started.
    case Time = 'time';

    // The console.timeEnd() static method stops a timer that was previously started by calling console.time().
    case TimeEnd = 'timeEnd';

    // Logs the current value of a timer that was previously started by calling console.time().
    case TimeLog = 'timeLog';

    // Outputs a stack trace to the console.
    case Trace = 'trace';

    // Outputs a warning message to the console at the &#39;warning&#39; log level.
    case Warn = 'warn';

}