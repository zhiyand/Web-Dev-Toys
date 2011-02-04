==== 数据库结构 ====

* 表 undercity : 用于存储副本信息

--------------------------------
id               | int
--------------------------------
uc_name          | varchar(128)
--------------------------------
uc_description   | text
--------------------------------

* 表 boss : 用于存储boss信息

--------------------------------
id                 | int
--------------------------------
undercity_id       | int
--------------------------------
boss_name          | varchar(128)
--------------------------------
boss_description   | text
--------------------------------
boss_attr          | text
--------------------------------

* 表 equipment : 用于存储装备信息

--------------------------------
id               | int
--------------------------------
eq_name          | varchar(128)
--------------------------------
eq_description   | text
--------------------------------
eq_attr          | text
--------------------------------

* 表equipment_dropping : 用于存储装备在boss身上掉落的信息, 关联boss表和equipment表

--------------------------------
id                 | int
--------------------------------
boss_id            | int
--------------------------------
equipment_id       | int
--------------------------------
chance             | double
--------------------------------

==== 两种结构 ====

* 一对多：undercity与boss

通过在boss表中的undercity_id将boss表中的记录与undercity表中的记录关联，从而表示了undercity与boss的一对多的关系

* 多对多：boss与equipment

通过表equipment_dropping中的(boss_id, equipment_id)将boss和equipment关联起来, 从而表示了boss与equipment的多对多关系

==== 装备爆率 ====

在数据库中，equipment_dropping表中的chance字段表示某件装备在某个boss身上的爆率，该值为(0,1］之间的数。

在程序处理上，当一个boss被击杀时，对他身上可能爆出的所有装备，逐一做如下操作：

	* 生成一个随机的(0, 1]区间的数字value
	* 将value与chance比较，若value小于chance，则爆出，反之则不爆出

