<?php

namespace Engine\Util;

enum LogicalOperators : string
{
	case OR = "or";
	case AND = "and";
	case NOR = "nor";
	case NAND = "nand";
	case XOR = "xor";
	case NXOR = "nxor"; // Biconditional
}