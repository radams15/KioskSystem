import gi
gi.require_version("Gtk", "3.0")
from gi.repository import Gtk

import threading
from time import sleep
from os.path import exists, join

SETTINGS_DIR = "../settings"
TOGGLES_DIR = "../toggles"

REFRESH_TIME = 2

num_kiosks = int(open(f"{SETTINGS_DIR}/numKiosks", "r").read())


def kiosk_enabled(n):
	return exists(join(TOGGLES_DIR, str(n)))


class ListBoxWindow(Gtk.Window):
	def __init__(self):
		Gtk.Window.__init__(self, title="Display")
		self.connect("destroy", self._quit)
		self.set_border_width(10)
		
		vbox = Gtk.Box(orientation=Gtk.Orientation.VERTICAL, spacing=50)
		
		self.kiosks = []

		for i in range(1, num_kiosks+1):
			hbox = Gtk.Box(orientation=Gtk.Orientation.HORIZONTAL, spacing=30)
			
			name = Gtk.Label(label="Kiosk")
			name.set_markup("<span size='xx-large'>Kiosk {}</span>".format(i))
			
			state = Gtk.Label(label="Disabled")
			
			name.set_justify(Gtk.Justification.CENTER)
			state.set_justify(Gtk.Justification.CENTER)
			
			self.kiosks.append([name, state])
			
			hbox.pack_start(name, True, True, True)
			hbox.pack_start(state, True, True, True)
			
			vbox.pack_start(hbox, True, True, True)
			
		def update():
			while self.update_thread_running:
				for n, (name_label, state_label) in enumerate(self.kiosks):
					n+=1
					
					if(kiosk_enabled(n)):
						state_label.set_markup("<span foreground='green' size='xx-large'>Enabled</span>")
					else:
						state_label.set_markup("<span foreground='red' size='xx-large'>Disabled</span>")
				sleep(REFRESH_TIME)
				
		self.update_thread_running = True
		
		self.update_thread = threading.Thread(target=update, args=())
		self.update_thread.start()
		
		self.add(vbox)
		
	def _quit(self, args):
		self.update_thread_running = False

		Gtk.main_quit()


win = ListBoxWindow()

win.connect("destroy", Gtk.main_quit)
win.show_all()

Gtk.main()

