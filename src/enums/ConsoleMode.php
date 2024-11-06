<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\enums;

enum ConsoleMode: string
{
    case ConsoleModeAssert = 'assert';
    case ConsoleModeClear = 'clear';
    case ConsoleModeCount = 'count';
    case ConsoleModeCountReset = 'countReset';
    case ConsoleModeDebug = 'debug';
    case ConsoleModeDir = 'dir';
    case ConsoleModeDirxml = 'dirxml';
    case ConsoleModeError = 'error';
    case ConsoleModeGroup = 'group';
    case ConsoleModeGroupCollapsed = 'groupCollapsed';
    case ConsoleModeGroupEnd = 'groupEnd';
    case ConsoleModeInfo = 'info';
    case ConsoleModeLog = 'log';
    case ConsoleModeTable = 'table';
    case ConsoleModeTime = 'time';
    case ConsoleModeTimeEnd = 'timeEnd';
    case ConsoleModeTimeLog = 'timeLog';
    case ConsoleModeTrace = 'trace';
    case ConsoleModeWarn = 'warn';

}
