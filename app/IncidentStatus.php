<?php

namespace App;

enum IncidentStatus: string
{
    case Open = 'open';
    case Assigned = 'assigned';
    case Investigating = 'investigating';
    case Resolved = 'resolved';
    case Closed = 'closed';
}
